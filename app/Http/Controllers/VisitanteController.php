<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class VisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const Paginacion=10;
    public function index(Request $request)
    {
        $buscar_observador= $request->input('buscar_observador');

        $notas=Nota::join('users','users.id','=','notas.id_observador')
            ->join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('generos','generos.id_genero','=','individuos.id_genero')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->join('escalas_bbch','escalas_bbch.id_bbch','=','individuos.id_bbch')
            ->join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->join('municipios','municipios.id_municipio','=','sitios.id_municipio')
            ->join('estados','estados.id_estado','=','municipios.id_estado')
            ->join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
            ->join('familias','familias.id_familia','=','individuos.id_familia')
            ->where('users.name','like','%'.$buscar_observador.'%')
            ->selectRaw('notas.id_nota as id_nota')
            ->selectRaw('notas.fecha as fecha')
            ->selectRaw('notas.dia_juliano as dia_juliano')
            ->selectRaw('users.name as observador')
            ->selectRaw('individuos.nombre_comun as nombre_comun')
            ->selectRaw('individuos.id_individuo as id_individuo')
            ->selectRaw('familias.descripcion as familia')
            ->selectRaw('generos.descripcion as genero')
            ->selectRaw('especies.descripcion as especie')
            ->selectRaw('subespecies.descripcion as subespecies')
            ->selectRaw('escalas_bbch.descripcion as escala_bbch')
            ->selectRaw('sitios.nombre as sitio')
            ->selectRaw('sitios.comunidad as comunidad')
            ->selectRaw('municipios.nombre as municipio')
            ->selectRaw('estados.nombre as estado')
            ->selectRaw('sitios.latitud as latitud')
            ->selectRaw('sitios.longitud as longitud')
            ->selectRaw('sitios.altitud as altitud')
            ->selectRaw('fenofases.descrip_fenofase as fenofase')
            ->selectRaw('notas.intensidad_fenofase as int_feno')
            ->selectRaw('notas.precipitacion as precipitacion')
            ->selectRaw('notas.temperatura_minima as temperatura_minima')
            ->selectRaw('notas.temperatura_maxima as temperatura_maxima')
            ->selectRaw('notas.hallazgos as nota')
            ->OrderBy('fecha','DESC')
            ->paginate($this::Paginacion);

        return view('Notas.index_visitante', compact('notas','buscar_observador'));
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
