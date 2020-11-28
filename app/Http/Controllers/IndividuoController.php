<?php

namespace App\Http\Controllers;

use App\Models\Individuo;
use Illuminate\Http\Request;

class IndividuoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const Paginacion=8;
    public function index(Request $request)
    {
        $buscar_individuo= $request->input('buscar_individuo');

        $datosindividuo=Individuo::join('generos','generos.id_genero','=','individuos.id_genero')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->join('familias','familias.id_familia','=','individuos.id_familia')
            ->join('escalas_bbch','escalas_bbch.id_bbch','=','individuos.id_bbch')
            ->where('individuos.nombre_comun','like','%'.$buscar_individuo.'%')
            ->selectRaw('individuos.id_individuo as id')
            ->selectRaw('individuos.nombre_comun as individuo')
            ->selectRaw('individuos.uso as usos')
            ->selectRaw('generos.descripcion as genero')
            ->selectRaw('subespecies.descripcion as subespecie')
            ->selectRaw('especies.descripcion as especie')
            ->selectRaw('familias.descripcion as familia')
            ->selectRaw('escalas_bbch.descripcion as bbch')
            ->groupBy('id_individuo')
            ->paginate($this::Paginacion);

        return view('Individuos.index', compact('datosindividuo','buscar_individuo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
