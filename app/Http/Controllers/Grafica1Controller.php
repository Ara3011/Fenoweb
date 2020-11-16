<?php

namespace App\Http\Controllers;

use App\Charts\CalendariosEspeciesChart;
use App\Charts\ObservacionesEspeciesChart;
use App\Charts\ObservacionesFenofasesChart;
use App\Charts\ObservacionesObservadoresChart;
use App\Charts\ObservacionesSitiosChart;
use App\Models\Nota;
use Carbon\Carbon;


class Grafica1Controller extends Controller
{
    function __construct() {
     $this->nota=new Nota();
    }
    public function observacionesobservadorInfo()
    {
        //consulta 4.3

        $datos=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->groupBy("observadores.nom");
        $categorias=$datos->pluck("observadores.nom");
        $valores=$datos->selectRaw("count(notas.created_at) as valor")->pluck("valor");
        return view('Graficas.grafica1', compact('categorias','valores'));

    }
    public function observacionesespeciesInfo()
    {
        //consulta 4.1

        $datos=Nota::join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->groupBy("especies.descripcion");
            $categorias=$datos->pluck("especies.descripcion");
            $valores=$datos->selectRaw("count(notas.created_at) as valor")->pluck("valor");




        return view('Graficas.grafica2', compact('categorias','valores'));

    }
    public function observacionessitiosInfo()
    {
        //consulta 4.2

        $datos=Nota::join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->join('municipios','municipios.id_municipio','=','sitios.id_municipio')
            ->join('estados','estados.id_estado','=','municipios.id_estado')
            ->groupBy("sitios.nombre");
            $categorias=$datos->pluck("sitios.nombre");
            $valores=$datos->selectRaw("count(notas.created_at) as valor")->pluck("valor");



        return view('Graficas.grafica3', compact('categorias','valores'));

    }
    public function observacionesfenofasesInfo()
    {
        //consulta 4.4 mamalona

        $datos=Nota::join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
            ->groupBy("fenofases.descrip_fenofase");
        $categorias=$datos->pluck("fenofases.descrip_fenofase");
        $valores=$datos->selectRaw("count(notas.created_at) as valor")->pluck("valor");


        return view('Graficas.grafica4', compact('categorias','valores'));

    }
    public function calendariosespeciesInfo()
    {

        //consulta 1.1

        $categorias=$this->nota->getCalendarioEspeciesInfo()->distinct("descrip_fenofase")->select("descrip_fenofase")->pluck("descrip_fenofase");
        $especies=$this->nota->getCalendarioEspeciesInfo()->select("especies.descripcion")->distinct("especies.descripcion")->orderby("especies.descripcion")->pluck("especies.descripcion");

        $data=array();
        foreach ($especies as $especie)
        {
            $aux=array();

            foreach ($categorias as $categoria)
            {
                $valor=$this->nota->getCalendarioEspeciesInfo()
                    ->whereDescripFenofase($categoria)->where("especies.descripcion",$especie)->get();
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


        //return $data;
        return view('Graficas.grafica5', compact('categorias',"data"));

    }
    public function grafica6()
    {
        //Consulta 9
        $datos=Nota::join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->groupBy('individuos.uso');
        $categorias=$datos->pluck('individuos.uso');
        $valores=$datos->selectRaw("count(individuos.uso) as valor")->pluck("valor");
        return view('Graficas.grafica6', compact('categorias','valores'));
    }
    public function grafica7()
    {
        //Consulta 11.2
        $datos=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->groupBy('observadores.nom')
            ->whereRaw('year(notas.created_at)=2014');
        $categorias=$datos->pluck('observadores.nom');
        $valores=$datos->selectRaw("count(notas.created_at) as valor")->pluck("valor");
        return view('Graficas.grafica7', compact('categorias','valores'));
    }

    public function grafica8()
    {
        //Consulta 11.3 Falta por corregir
        $datos=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->groupBy('observadores.nom')
            ->whereRaw('year(notas.created_at)=2014');
        $categorias=$datos->pluck('observadores.nom');
        $valores=$datos->selectRaw("count(notas.created_at) as valor")->pluck("valor");
        return view('Graficas.grafica8', compact('categorias','valores'));
    }
    public function grafica9()
    {
        //Consulta 12.1 Falta por corregir
        //select n.created_at  fecha, n.dia_juliano  dia_juliano, o.nom observador, i.nombre_comun nombre_comun,f.descripcion familia,
        // g.descripcion genero, e.descripcion especie
        //,su.descripcion subespecie, gr.descripcion grupo, i.id_individuo id_individuo, s.nombre sitio,s.id_sitio id_sitio,s.comunidad comunidad,m.nombre municipio,
        //       es.nombre estado,s.latitud latitud,s.longitud longitud,s.altitud altitud, fe.id_fenofase id_fenofase, fe.descrip_fenofase fenofase, n.precipitacion,
        //       n.temperatura_minima temperatura_minima, n.temperatura_maxima temperatura_maxima, n.hallazgos nota
        //       from notas n, observadores o, individuos i,familias f, generos g, especies e,
        //            subespecies su, escalas_bbch gr, sitios s, municipios m, estados es, fenofases fe
        //where  o.id_observador=n.id_observador and n.id_individuo=i.id_individuo
        //and g.id_genero=i.id_genero and su.id_subespecie=i.id_subespecie and su.id_especie=e.id_especie
        //and gr.id_bbch=i.id_bbch and s.id_sitio=n.id_sitio and m.id_municipio=s.id_municipio and
        //es.id_estado=m.id_estado and fe.id_fenofase=n.id_fenofase and s.nombre='Xorejé' and e.descripcion='leiophylla Schiede ex Schltdl. & Cham.';
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
            ->whereRaw('sitios.nombre="Xorejé"')
            ->whereRaw('especies.descripcion="leiophylla Schiede ex Schltdl. & Cham."')
            ->selectRaw('notas.created_at as fecha')
            ->selectRaw('notas.dia_juliano as dia_juliano')
            ->selectRaw('observadores.nom as observador')
            ->selectRaw('individuos.nombre_comun as nombre_común')
            ->selectRaw('familias.descripcion as familia')
            ->selectRaw('generos.descripcion as genero')
            ->selectRaw('especies.descripcion as especie')
            ->selectRaw('subespecies.descripcion as subespecies')
            ->selectRaw('escalas_bbch.descripcion as escala_bbch')
            ->selectRaw('individuos.id_individuo as id_individuo')
            ->selectRaw('sitios.nombre as sitio')
            ->selectRaw('sitios.id_sitio as id_sitio')
            ->selectRaw('sitios.comunidad as comunidad')
            ->selectRaw('municipios.nombre as municipio')
            ->selectRaw('estados.nombre as estado')
            ->selectRaw('sitios.latitud as latitud')
            ->selectRaw('sitios.longitud as longitud')
            ->selectRaw('sitios.altitud as altitud')
            ->selectRaw('fenofases.id_fenofase as id_fenofase')
            ->selectRaw('fenofases.descrip_fenofase as fenofase')
            ->selectRaw('notas.precipitacion as precipitación')
            ->selectRaw('notas.temperatura_minima as temperatura_minima')
            ->selectRaw('notas.temperatura_maxima as temperatura_maxima')
            ->selectRaw('notas.hallazgos as nota')
            ->get();
        return($datos);
    }
}
