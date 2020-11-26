<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use App\Models\Municipio;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const Paginacion=10;
    public function index()
    {

        $datosmunicipio=Municipio::join('estados','estados.id_estado','=','municipios.id_estado')
            ->selectRaw('municipios.id_municipio as id_municipio')
            ->selectRaw('municipios.nombre as municipio')
            ->selectRaw('estados.id_estado as id_estado')
            ->selectRaw('estados.nombre as estado')
            ->paginate($this::Paginacion);

        return view('Municipios.index', compact('datosmunicipio'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados=Municipio::join('estados','estados.id_estado','=','municipios.id_estado')
            ->selectRaw('estados.id_estado as id')
            ->selectRaw('estados.nombre as estado')
            ->distinct('estados.nombre')
            ->get();


        return view('Municipios.create', compact('estados'));
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
            'nombre' => 'required',
            'id_estado'=>'required',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        Municipio::create($request->all());

        return redirect()->route('municipios.index')
            ->with('Mensaje','Clima Creado Con éxito');

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
    public function edit($id_municipio)
    {
        $datosmunicipios= Municipio::findOrFail($id_municipio);
        return view('municipios.edit ', compact('datosmunicipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_municipio)
    {
        $datosMunicipio=request()->except(['_token','_method']);
        Municipio::where('id_municipio','=',$id_municipio)->update($datosMunicipio);

        return redirect()->route('municipios.index')
            ->with('Mensaje','Clima Actualizado Con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio)
    {
        $municipio->delete();

        return redirect()->route('municipios.index')
            ->with('Mensaje','Clima Eliminado Con éxito');
    }
}
