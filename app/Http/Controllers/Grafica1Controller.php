<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Grafica1Controller extends Controller
{
    public function index(Request $request)
    {
        return view('graficas.grafica1');
    }
}
