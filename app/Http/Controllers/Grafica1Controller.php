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
}
