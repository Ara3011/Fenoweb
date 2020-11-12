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

        $notas=Nota::join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->select ("especies.descripcion")
            ->selectRaw("count(notas.created_at) as resultado")
            ->groupBy("especies.descripcion")
            ->get();
        $chart=new ObservacionesEspeciesChart();
        $chart->labels($notas->pluck("especies.descripcion"));
        $chart->dataset('Nombre de la especie','bar',$notas->pluck('resultado'));
        return($notas);

        return view('Graficas.grafica2', compact('chart'));

    }
    public function observacionessitiosInfo()
    {
        //consulta 4.2

        $notas=Nota::join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->join('municipios','municipios.id_municipio','=','sitios.id_municipio')
            ->join('estados','estados.id_estado','=','municipios.id_estado')
            ->select ("sitios.nombre")
            ->selectRaw("count(notas.created_at) as resultado")
            ->groupBy("sitios.nombre")
            ->get();
        $chart=new ObservacionesSitiosChart();
        $chart->labels($notas->pluck("sitios.nombre"));
        $chart->dataset('Nombre de el sitio','bar',$notas->pluck('resultado'));
        return($notas);

        return view('Graficas.grafica3', compact('chart'));

    }
    public function observacionesfenofasesInfo()
    {
        //consulta 4.4

        $notas=Nota::join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
            ->select ("fenofases.descrip_fenofase")
            ->selectRaw("count(notas.created_at) as resultado")
            ->groupBy("fenofases.descrip_fenofase")
            ->get();
        $chart=new ObservacionesFenofasesChart();
        $chart->labels($notas->pluck("fenofases.descrip_fenofase"));
        $chart->dataset('Nombre de la fenofase','bar',$notas->pluck('resultado'));
        return($notas);

        return view('Graficas.grafica4', compact('chart'));

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
}
