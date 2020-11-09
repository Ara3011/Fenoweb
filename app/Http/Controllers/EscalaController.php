<?php

namespace App\Http\Controllers;

use App\Models\Escala;
use Illuminate\Http\Request;

class EscalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const Paginacion=7;
    public function index(Request $request)
    {
        $buscar=$request->get('buscar');
        $escalas=Escala::where('descripcion','like','%'.$buscar.'%')->paginate($this::Paginacion);
        return view('escalas.index',compact('escalas','buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escalas.create');
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

        Escala::create($request->all());

        return redirect()->route('escalas.index')
            ->with('Mensaje','Escala Creada Con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escala  $escala
     * @return \Illuminate\Http\Response
     */
    public function show(Escala $escala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Escala  $escala
     * @return \Illuminate\Http\Response
     */
    public function edit($id_bbch)
    {
        $escala= Escala::findOrFail($id_bbch);
        return view('escalas.edit ', compact('escala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Escala  $escala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_bbch)
    {
        $datosEscala=request()->except(['_token','_method']);
        Escala::where('id_bbch','=',$id_bbch)->update($datosEscala);



        return redirect()->route('escalas.index')
            ->with('Mensaje','Escala Actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escala  $escala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escala $escala)
    {
        $escala->delete();

        return redirect()->route('escalas.index')
            ->with('Mensaje','Escala Eliminada Con éxito');
    }
}
