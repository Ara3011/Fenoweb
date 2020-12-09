<?php

namespace App\Http\Controllers;


use App\Exports\NotasExport;
use App\Models\Nota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class Grafica1Controller extends Controller

{
    const Paginacion=6;
    function __construct() {
     $this->nota=new Nota();
    }
    public function observacionesobservadorInfo()
    {
        //consulta 4.3 Observaciones por cada observador

        $datos=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->select("observadores.nom")
            ->selectRaw("count(notas.fecha) as valor")
            ->groupBy("observadores.nom")
            ->get();


        $datos=json_encode($datos);
        $datos=str_replace('"nom"','name',$datos);
        $datos=str_replace('"valor":',"y:",$datos);

        //return $datos;
        return view('Graficas.grafica1', compact('datos'));

    }
    public function observacionesespeciesInfo()
    {
        //consulta 4.1 Observaciones para cada especie

        $datos=Nota::join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->select("especies.descripcion")
            ->selectRaw("count(notas.fecha) as valor")
            ->groupBy("especies.descripcion")
            ->get();
        $datos=json_encode($datos);
        $datos=str_replace('"descripcion"','name',$datos);
        $datos=str_replace('"valor":',"y:",$datos);
        //return $datos;
        return view('Graficas.grafica2', compact('datos'));

    }
    public function observacionessitiosInfo()
    {
        //consulta 4.2 Observaciones para cada sitio

        $datos=Nota::join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->join('municipios','municipios.id_municipio','=','sitios.id_municipio')
            ->join('estados','estados.id_estado','=','municipios.id_estado')
            ->groupBy("sitios.nombre");
            $categorias=$datos->pluck("sitios.nombre");
            $valores=$datos->selectRaw("count(notas.fecha) as valor")->pluck("valor");



        return view('Graficas.grafica3', compact('categorias','valores'));

    }
    public function observacionesfenofasesInfo()
    {
        //consulta 4.4 Observaciones para cada fase fenologica

        $datos=Nota::join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
            ->groupBy("fenofases.descrip_fenofase");
        $categorias=$datos->pluck("fenofases.descrip_fenofase");
        $valores=$datos->selectRaw("count(notas.fecha) as valor")->pluck("valor");


        return view('Graficas.grafica4', compact('categorias','valores'));

    }
    public function calendariosespeciesInfo(Request $request)
    {

        //consulta 1.1 Calendario particular por especie y por individuo por mes y por grupo de planta (escala BBCH), (ID de individuo y fenofase)
        $buscar_anio= $request->input('buscar_anio');
        $categorias=$this->nota->getCalendarioEspeciesInfo()->distinct("descrip_fenofase")->select("descrip_fenofase")->pluck("descrip_fenofase");
        $especies=$this->nota->getCalendarioEspeciesInfo()->select("especies.descripcion")->distinct("especies.descripcion")->orderby("especies.descripcion")->pluck("especies.descripcion");
        $anos=$this->nota->selectRaw('year(fecha) as anio')
            ->distinct('year(fecha)')
            ->orderBy('anio', 'DESC')->get();

        $data=array();
        foreach ($especies as $especie)
        {
            $aux=array();

            foreach ($categorias as $categoria)
            {
                $valor=$this->nota->getCalendarioEspeciesInfo()
                    ->whereDescripFenofase($categoria)->where("especies.descripcion",$especie)
                    ->whereYear('notas.fecha','like','%'.$buscar_anio.'%')->get();
                if($valor->count()>0) {
                   // $date = strtotime($valor[0]->primera_fecha);

                    //return $date;
                    array_push($aux, ["low" => "Date.parse('{$valor[0]->primera_fecha}')",
                        "high" =>"Date.parse('{$valor[0]->ultima_fecha}')",
                        "name" => $valor[0]->resultado
                    ]);
                }
               else
                    array_push($aux, []);
            }
            array_push($data,["name"=>"'".$especie."'","data"=>$aux]);
        }


        return view('Graficas.grafica5', compact('categorias',"data","buscar_anio","anos"));

    }
    public function grafica6()
    {
        //Consulta 9 ¿Cuáles son los mayores usos que se le dan a la especie?
        $datos=Nota::join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->select('individuos.uso')
            ->selectRaw("count(individuos.uso) as valor")
            ->groupBy('individuos.uso')
            ->get();
        $datos=json_encode($datos);
        $datos=str_replace('"uso"','name',$datos);
        $datos=str_replace('"valor"','y',$datos);
        return view('Graficas.grafica6', compact('datos'));
    }
    public function grafica7(Request $request)
    {
        //Consulta 11.2 ¿Cuántos registros colecto un observador X en un año?
        $buscar_observador= $request->input('buscar_observador');
        $buscar_anio= $request->input('buscar_anio');

        $datos=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->select('observadores.nom')
            ->selectRaw("count(notas.fecha) as valor")
            ->whereYear('notas.fecha','like','%'.$buscar_anio.'%')
            ->where('observadores.nom','like','%'.$buscar_observador.'%')
            ->groupBy('observadores.nom')
            ->orderBy('valor', 'DESC')
            ->get();

            $datos=json_encode($datos);
            $datos=str_replace('"nom":','',$datos);
            $datos=str_replace('"valor":','',$datos);
            $datos=str_replace('{','[',$datos);
            $datos=str_replace('}',']',$datos);

        $observadores=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->selectRaw('observadores.nom as nombre')
            ->distinct('observadores.nom')
            ->get();


        $anios=Nota::selectRaw('year(fecha) as anio')
            ->distinct('year(fecha)')
            ->orderBy('anio', 'DESC')->get();


        return view('Graficas.grafica7', compact('datos','observadores','anios',
        'buscar_anio','buscar_observador'));

    }

    public function grafica8(Request $request)
    {
        //Consulta 11.3 ¿Cuántos sitios monitorea un observador X en un año?

        $buscar_observador= $request->input('buscar_observador');
        $buscar_anio= $request->input('buscar_anio');

        $datos=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->select('observadores.nom')
            ->selectRaw("count(DISTINCT sitios.id_sitio) as valor")
            ->whereYear('notas.fecha','like','%'.$buscar_anio.'%')
            ->where('observadores.nom','like','%'.$buscar_observador.'%')
            ->groupBy('observadores.nom')
            ->orderBy('valor', 'DESC')
            ->get();

        $datos=json_encode($datos);
        $datos=str_replace('"nom":','',$datos);
        $datos=str_replace('"valor":','',$datos);
        $datos=str_replace('{','[',$datos);
        $datos=str_replace('}',']',$datos);

        $observadores=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->selectRaw('observadores.nom as nombre')
            ->distinct('observadores.nom')
            ->get();


        $anios=Nota::selectRaw('year(fecha) as anio')
            ->distinct('year(fecha)')
            ->orderBy('anio', 'DESC')->get();

        return view('Graficas.grafica8', compact('datos','anios','observadores',
        'buscar_anio','buscar_observador'));
    }

    public function grafica9(Request $request)
    {

        //Consulta 12.1 obtener coordenadas XY por especie, tipo plantas y fase (que incluya toda la base completa).
        $buscar_sitio= $request->input('buscar_sitio');
        $buscar_especie= $request->input('buscar_especie');


        $datos=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('generos','generos.id_genero','=','individuos.id_genero')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->join('escalas_bbch','escalas_bbch.id_bbch','=','individuos.id_bbch')
            ->join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->join('municipios','municipios.id_municipio','=','sitios.id_municipio')
            ->join('estados','estados.id_estado','=','municipios.id_estado')
            ->join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
            ->join('familias','familias.id_familia','=','individuos.id_familia')
            ->where('sitios.nombre','like','%'.$buscar_sitio.'%')
            ->where('especies.descripcion','like','%'.$buscar_especie.'%')
            ->selectRaw('notas.fecha as fecha')
            ->selectRaw('notas.dia_juliano as dia_juliano')
            ->selectRaw('observadores.nom as observador')
            ->selectRaw('individuos.nombre_comun as nombre_comun')
            ->selectRaw('familias.descripcion as familia')
            ->selectRaw('generos.descripcion as genero')
            ->selectRaw('especies.descripcion as especie')
            ->selectRaw('subespecies.descripcion as subespecies')
            ->selectRaw('escalas_bbch.descripcion as escala_bbch')
            ->selectRaw('sitios.nombre as sitio')
            ->selectRaw('sitios.comunidad as comunidad')
            ->selectRaw('municipios.nombre as municipio')
            ->selectRaw('estados.nombre as estado')
            ->selectRaw('sitios.latitud as latitud')
            ->selectRaw('sitios.longitud as longitud')
            ->selectRaw('sitios.altitud as altitud')
            ->selectRaw('fenofases.descrip_fenofase as fenofase')
            ->selectRaw('notas.intensidad_fenofase as int_feno')
            ->selectRaw('notas.precipitacion as precipitacion')
            ->selectRaw('notas.temperatura_minima as temperatura_minima')
            ->selectRaw('notas.temperatura_maxima as temperatura_maxima')
            ->selectRaw('notas.hallazgos as nota')
            ->paginate($this::Paginacion);

        $sitios=Nota::join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->selectRaw('sitios.nombre as sitio')
            ->distinct('sitios.nombre')
            ->get();

        $especies=Nota::join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->selectRaw('especies.descripcion as especie')
            ->distinct('especies.descripcion')
            ->get();

        return view('Graficas.grafica9', compact('datos','buscar_sitio','sitios','especies','buscar_especie'));
    }

    public function bladeToExcel()
    {
     return Excel::download(new NotasExport, 'notas.xlsx');
    }
    public function grafica10(Request $request)
    {
        //Consulta 11.1 ¿Cuántas especies registro cada observador por año en un año?

        $buscar_anio= $request->input('buscar_anio');

        $datos=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->select('observadores.nom')
            ->selectRaw("count(DISTINCT especies.id_especie) as valor")
            ->whereYear('notas.fecha','like','%'.$buscar_anio.'%')
            ->groupBy('observadores.nom')
            ->orderBy('valor', 'DESC')
            ->get();

        $datos=json_encode($datos);
        $datos=str_replace('"nom":','',$datos);
        $datos=str_replace('"valor":','',$datos);
        $datos=str_replace('{','[',$datos);
        $datos=str_replace('}',']',$datos);


        $anios=Nota::selectRaw('year(fecha) as anio')
            ->distinct('year(fecha)')
            ->orderBy('anio', 'DESC')->get();

        return view('Graficas.grafica10 ', compact('datos','anios',
            'buscar_anio'));
    }

    public function grafica11(Request $request)
    {
        //Consulta 11.4	¿Cuántas fenofases monitorea un observador X en un año?

        $buscar_anio= $request->input('buscar_anio');
        $buscar_observador=$request->input('buscar_observador');

        $datos=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
            ->select('observadores.nom')
            ->selectRaw("count(DISTINCT fenofases.id_fenofase) as valor")
            ->whereYear('notas.fecha','like','%'.$buscar_anio.'%')
            ->where('observadores.nom','like','%'.$buscar_observador.'%')
            ->groupBy('observadores.nom')
            ->orderBy('valor', 'DESC')
            ->get();

        $datos=json_encode($datos);
        $datos=str_replace('"nom":','',$datos);
        $datos=str_replace('"valor":','',$datos);
        $datos=str_replace('{','[',$datos);
        $datos=str_replace('}',']',$datos);



        $observadores=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->selectRaw('observadores.nom as nombre')
            ->distinct('observadores.nom')
            ->get();

        $anios=Nota::selectRaw('year(fecha) as anio')
            ->distinct('year(fecha)')
            ->orderBy('anio', 'DESC')->get();

        return view('Graficas.grafica11 ', compact('datos','anios',
            'buscar_anio','observadores','buscar_observador'));
    }
    public function grafica12(Request $request)
    {

        //consulta 1.5	Gráficos por de fecha de aparición de fase fenológica de diversas especies en un solo sitio.
        // Identificar las fechas de inicio y fin de cada fase fenológica de diferentes especies en un solo sitio, por estado, por municipio y comunidad.
        // Gráficos de fases fenológicas. Fecha, ID individuo, ID fenofase, ID sitio
        $buscar_sitio= $request->input('buscar_sitio');
        $buscar_comunidad= $request->input('buscar_comunidad');
        $buscar_municipio= $request->input('buscar_municipio');
        $buscar_estado= $request->input('buscar_estado');



        $categorias=$this->nota->getCalendarioEspeciesInfo()->distinct("descrip_fenofase")->select("descrip_fenofase")->pluck("descrip_fenofase");
        $especies=$this->nota->getCalendarioEspeciesInfo()->select("especies.descripcion")->distinct("especies.descripcion")->orderby("especies.descripcion")->pluck("especies.descripcion");

        $sitios=$this->nota->join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->select('sitios.nombre as sitio')
            ->distinct("sitios.nombre as sitio")
            ->orderBy('sitio', 'ASC')->get();

        $municipios=$this->nota->join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->join('municipios','municipios.id_municipio','=','sitios.id_municipio')
            ->select('municipios.nombre as municipio')
            ->distinct("municipios.nombre as municipio")
            ->orderBy('municipio', 'ASC')->get();

        $comunidadades=$this->nota->join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->select('sitios.comunidad as comunidad')
            ->distinct("sitios.comunidad as comunidad")
            ->orderBy('comunidad', 'ASC')->get();

        $estados=$this->nota->join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->join('municipios','municipios.id_municipio','=','sitios.id_municipio')
            ->join('estados','estados.id_estado','=','municipios.id_estado')
            ->select('estados.nombre as estado')
            ->distinct("estados.nombre as estado")
            ->orderBy('estado', 'ASC')->get();

        $data=array();
        foreach ($especies as $especie)
        {
            $aux=array();

            foreach ($categorias as $categoria)
            {
                $valor=$this->nota->getCalendarioEspeciesInfo()
                    ->whereDescripFenofase($categoria)->where("especies.descripcion",$especie)
                    ->where('sitios.nombre','like','%'.$buscar_sitio.'%')
                    ->where('sitios.comunidad','like','%'.$buscar_comunidad.'%')
                    ->where('municipios.nombre','like','%'.$buscar_municipio.'%')
                    ->where('estados.nombre','like','%'.$buscar_estado.'%')->get();

                if($valor->count()>0) {
                    // $date = strtotime($valor[0]->primera_fecha);

                    //return $date;
                    array_push($aux, ["low" => "Date.parse('{$valor[0]->primera_fecha}')",
                        "high" =>"Date.parse('{$valor[0]->ultima_fecha}')",
                        "name" => $valor[0]->resultado
                    ]);
                }
                else
                    array_push($aux, []);
            }
            array_push($data,["name"=>"'".$especie."'","data"=>$aux]);
        }


        return view('Graficas.grafica12', compact('categorias',"data","buscar_sitio","sitios","municipios",
        "buscar_municipio","comunidadades","buscar_comunidad","buscar_estado","estados"));

    }

}
