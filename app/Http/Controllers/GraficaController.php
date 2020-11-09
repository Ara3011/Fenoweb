<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraficaController extends Controller
{
    public function index(Request $request)
    {
        return view('graficas.grafica');
    }
}
