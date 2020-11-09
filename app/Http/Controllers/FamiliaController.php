<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use Illuminate\Http\Request;

class FamiliaController extends Controller
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
        $familias=Familia::where('descripcion','like','%'.$buscar.'%')->paginate($this::Paginacion);
        return view('familias.index',compact('familias','buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('familias.create');
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

        Familia::create($request->all());

        return redirect()->route('familias.index')
            ->with('Mensaje','Familia Creada Con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function show(Familia $familia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function edit($id_familia)
    {
        $familia= Familia::findOrFail($id_familia);
        return view('familias.edit ', compact('familia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_familia)
    {
        $datosFamilia=request()->except(['_token','_method']);
        Familia::where('id_familia','=',$id_familia)->update($datosFamilia);



        return redirect()->route('familias.index')
            ->with('Mensaje','Familia Actualizada Con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Familia $familia)
    {
        $familia->delete();

        return redirect()->route('familias.index')
            ->with('Mensaje','Familia Eliminada Con éxito');
    }
}
