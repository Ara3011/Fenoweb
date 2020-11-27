<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const Paginacion=6;
    public function index(Request $request)
    {
        $buscar_observador= $request->input('buscar_observador');

        $notas=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
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
            ->where('observadores.nom','like','%'.$buscar_observador.'%')
            ->selectRaw('notas.created_at as fecha')
            ->selectRaw('notas.dia_juliano as dia_juliano')
            ->selectRaw('observadores.nom as observador')
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
            ->paginate($this::Paginacion);

        return view('Notas.notas', compact('notas','buscar_observador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $individuos=Nota::join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->selectRaw('individuos.id_individuo as id_individuo')
            ->selectRaw('individuos.nombre_comun as nombre_comun')
            ->distinct('individuos.nombre_comun')
            ->get();

        $observadores=Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
            ->selectRaw('observadores.id_observador as id_observador')
            ->selectRaw('observadores.nom as nombre')
            ->distinct('observadores.nom')
            ->get();

        $sitios=Nota::join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->selectRaw('sitios.id_sitio as id_sitio')
            ->selectRaw('sitios.nombre as sitio')
            ->distinct('sitios.nombre')
            ->get();
        $fenofases=Nota::join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
            ->selectRaw('fenofases.id_fenofase as id_fenofase')
            ->selectRaw('fenofases.descrip_fenofase as fenofase')
            ->distinct('fenofases.descrip_fenofase')
            ->get();

        $climas=Nota::join('climas','climas.id_clima','=','notas.id_clima')
            ->selectRaw('climas.id_clima as id_clima')
            ->selectRaw('climas.descripcion as clima')
            ->distinct('climas.descripcion')
            ->get();

        return view('Notas.create', compact('individuos','observadores','sitios','fenofases','climas'));


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
            'dia_juliano' => 'required',
            'id_observador'=>'required',
            'hallazgos'=>'required',
            'temperatura_maxima'=>'required',
            'temperatura_minima'=>'required',
            'precipitacion'=>'required',
            'intensidad_fenofase'=>'required',
            'id_individuo'=>'required',
            'id_sitio'=>'required',
            'id_fenofase'=>'required',
            'id_clima'=>'required',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        Nota::create($request->all());

        return redirect()->route('notas.index')
            ->with('Mensaje','Nota Creada con éxito');
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
