<?php

namespace App\Http\Controllers;

use App\Charts\ObservacionesEspeciesChart;
use App\Charts\ObservacionesFenofasesChart;
use App\Charts\ObservacionesObservadoresChart;
use App\Charts\ObservacionesSitiosChart;
use App\Models\Nota;


class Grafica1Controller extends Controller
{
    public function observacionesobservadorInfo()
    {
        //consulta 4.3


        $notas=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
        ->select ("observadores.nom")
        ->selectRaw("count(notas.created_at) as resultado")
        ->groupBy("observadores.nom")
        ->get();
        $chart=new ObservacionesObservadoresChart();
        $chart->labels($notas->pluck("Observadores.nom"));
        $chart->dataset('Nombre del Observador','bar',$notas->pluck('resultado'));
        return($notas);

        return view('Graficas.grafica1', compact('chart'));

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
}
