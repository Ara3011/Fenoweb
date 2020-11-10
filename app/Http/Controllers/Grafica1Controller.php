<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especies;
use App\Models\Clima;

class Grafica1Controller extends Controller
{
public function especiesInfo()
{
    $semanales=Clima::groupBy("");
}
}
