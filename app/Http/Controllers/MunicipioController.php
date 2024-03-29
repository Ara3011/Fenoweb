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
    const Paginacion=8;
    public function index(Request $request)
    {
        $buscar= $request->input('buscar');
        $datosmunicipio=Municipio::join('estados','estados.id_estado','=','municipios.id_estado')
            ->where('municipios.nombre','like','%'.$buscar.'%')
            ->selectRaw('municipios.id_municipio as id_municipio')
            ->selectRaw('municipios.nombre as municipio')
            ->selectRaw('estados.id_estado as id_estado')
            ->selectRaw('estados.nombre as estado')
            ->paginate($this::Paginacion);

        return view('Municipios.index', compact('datosmunicipio','buscar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados=Estado::selectRaw('estados.id_estado as id')
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
            ->with('Mensaje','Municipio Creado Con éxito');

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
        $estados=Estado::
            selectRaw('estados.id_estado as id')
            ->selectRaw('estados.nombre as estado')
            ->distinct('estados.nombre')
            ->get();


        $datosmunicipios= Municipio::findOrFail($id_municipio);
        return view('municipios.edit ', compact('datosmunicipios','estados'));
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
            ->with('Mensaje','Municipio Actualizado Con éxito');


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
            ->with('Mensaje','Municipio Eliminado Con éxito');
    }
}
