<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Sitio;
use Illuminate\Http\Request;

class SitioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const Paginacion=8;
    public function index(Request $request)
    {

        $buscar_sitio= $request->input('buscar_sitio');

        $datossitios=Sitio::join('municipios','municipios.id_municipio','=','sitios.id_municipio')
            ->join('estados','estados.id_estado','=','municipios.id_estado')
            ->where('sitios.nombre','like','%'.$buscar_sitio.'%')
            ->selectRaw('sitios.id_sitio as id_sitio')
            ->selectRaw('sitios.nombre as sitio')
            ->selectRaw('sitios.comunidad as comunidad')
            ->selectRaw('sitios.latitud as latitud')
            ->selectRaw('sitios.longitud as longitud')
            ->selectRaw('sitios.altitud as altitud')
            ->selectRaw('municipios.nombre as municipio')
            ->selectRaw('estados.nombre as estado')
            ->paginate($this::Paginacion);

        return view('sitios.index', compact('datossitios','buscar_sitio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios=Municipio::
            selectRaw('municipios.id_municipio as id_municipio')
            ->selectRaw('municipios.nombre as municipio')
            ->distinct('municipios.nombre')
            ->get();

        return view('sitios.create', compact('municipios'));
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
            'comunidad'=>'required',
            'latitud'=>'required',
            'longitud'=>'required',
            'altitud'=>'required',
            'id_municipio'=>'required',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        Sitio::create($request->all());

        return redirect()->route('sitios.index')
            ->with('Mensaje','Sitio Creado Con éxito');
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
    public function edit($id_sitio)
    {
        $municipios=Municipio::
        selectRaw('municipios.id_municipio as id_municipio')
            ->selectRaw('municipios.nombre as municipio')
            ->distinct('municipios.nombre')
            ->get();

        $datossitios= Sitio::findOrFail($id_sitio);
        return view('sitios.edit ', compact('datossitios','municipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sitio)
    {
        $datossitios=request()->except(['_token','_method']);
        Sitio::where('id_sitio','=',$id_sitio)->update($datossitios);

        return redirect()->route('sitios.index')
            ->with('Mensaje','Sitio Actualizado Con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sitio $sitio)
    {
        $sitio->delete();

        return redirect()->route('sitios.index')
            ->with('Mensaje','Sitio Eliminado Con éxito');
    }
}
