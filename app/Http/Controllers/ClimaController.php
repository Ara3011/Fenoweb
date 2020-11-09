<?php

namespace App\Http\Controllers;

use App\Models\Clima;
use Illuminate\Http\Request;

class ClimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    const Paginacion=7;
    public function index(Request $request)
    {
        $buscar=$request->get('buscar');
        $climas=Clima::where('descripcion','like','%'.$buscar.'%')->paginate($this::Paginacion);
        return view('climas.index',compact('climas','buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('climas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        Clima::create($request->all());

        return redirect()->route('climas.index')
            ->with('Mensaje','Clima Creado Con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function show(Clima $clima)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function edit($id_clima)
    {
        $clima= Clima::findOrFail($id_clima);
        return view('climas.edit ', compact('clima'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_clima)
    {
        $datosClima=request()->except(['_token','_method']);
        Clima::where('id_clima','=',$id_clima)->update($datosClima);



        return redirect()->route('climas.index')
            ->with('Mensaje','Clima Actualizado Con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clima $clima)
    {
        $clima->delete();

        return redirect()->route('climas.index')
            ->with('Mensaje','Clima Eliminado Con éxito');
    }
}
