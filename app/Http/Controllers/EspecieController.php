<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
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
        $especies=Especie::where('descripcion','like','%'.$buscar.'%')->paginate($this::Paginacion);
        return view('especies.index',compact('especies','buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especies.create');
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

        Especie::create($request->all());

        return redirect()->route('especies.index')
            ->with('Mensaje','Especie creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function show(Especie $especie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function edit($id_especie)
    {
        $especie= Especie::findOrFail($id_especie);
        return view('especies.edit ', compact('especie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_especie)
    {
        $datosEspecie=request()->except(['_token','_method']);
        Especie::where('id_especie','=',$id_especie)->update($datosEspecie);



        return redirect()->route('especies.index')
            ->with('Mensaje','Especie Actualizado Con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especie $especie)
    {
        $especie->delete();
        return redirect()->route('especies.index')
            ->with('Mensaje','Especie Eliminada Con éxito');
    }
}
