<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
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
        $generos=Genero::where('descripcion','like','%'.$buscar.'%')->paginate($this::Paginacion);
        return view('generos.index',compact('generos','buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('generos.create');
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

        Genero::create($request->all());

        return redirect()->route('generos.index')
            ->with('Mensaje','Género Creado Con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit($id_genero)
    {
        $genero= Genero::findOrFail($id_genero);
        return view('generos.edit ', compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_genero)
    {
        $datosGenero=request()->except(['_token','_method']);
        Genero::where('id_genero','=',$id_genero)->update($datosGenero);



        return redirect()->route('generos.index')
            ->with('Mensaje','Género Actualizado Con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();

        return redirect()->route('generos.index')
            ->with('Mensaje','Género Eliminado Con éxito');
    }
}
