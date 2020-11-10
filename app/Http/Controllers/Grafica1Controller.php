<?php

namespace App\Http\Controllers;

use App\Charts\ObservacionesEspeciesChart;
use App\Models\Nota;


class Grafica1Controller extends Controller
{
public function observacionesespeciesInfo()
{
    $notas=Nota::groupBy("Observadores.nom")
        ->join('Observadores','Observadores.id_observador','=','Notas.id_nota')
    ->select ("Observadores.nom")
    ->selectRaw("Notas.created_at as resultado")

    ->get();
    $chart=new ObservacionesEspeciesChart();
    $chart->labels($notas->pluck("Observadores.nom"));
    $chart->dataset('Nombre','pie',$notas->pluck('resultado'));

    return view('Graficas.grafica1', compact('chart'));

}

}
