<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Clima;
use App\Models\Escala;
use App\Models\Especie;
use App\Models\Familia;
use App\Models\Fenofase;
use App\Models\Genero;
use App\Models\Individuo;
use App\Models\Municipio;
use App\Models\Nota;
use App\Models\Observador;
use App\Models\Sitio;
use App\Models\Subespecie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Nullable;

class NotaController extends Controller
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
            ->selectRaw('notas.fecha as fecha')
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
            ->OrderBy('fecha','DESC')
            ->paginate($this::Paginacion);

        return view('Notas.index', compact('notas','buscar_observador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //INFORMACIÓN PARA LLENAR COMBOS DE FORMULARIO UTILIZANDO SUS MODELOS
    {

        $familias=Familia::selectRaw('familias.id_familia as id_familia')
            ->selectRaw('familias.descripcion as familia')
            ->distinct('familias.descripcion')
            ->get();

        $generos=Genero::selectRaw('generos.id_genero as id_genero')
            ->selectRaw('generos.descripcion as genero')
            ->distinct('generos.descripcion')
            ->get();

        $especies=Especie::selectRaw('especies.id_especie as id_especie')
            ->selectRaw('especies.descripcion as especie')
            ->distinct('especies.descripcion')
            ->get();
        $escalas=Escala::selectRaw('escalas_bbch.id_bbch as id_bbch')
            ->selectRaw('escalas_bbch.descripcion as escala')
            ->distinct('escalas_bbch.descripcion')
            ->get();
        $observadores=Observador::selectRaw('observadores.id_observador as id_observador')
            ->selectRaw('observadores.nom as nombre')
            ->where('observadores.id_observador',3)
            ->distinct('observadores.nom')
            ->get();
        $sitios=Sitio::selectRaw('sitios.id_sitio as id_sitio')
            ->selectRaw('sitios.nombre as sitio')
            ->distinct('sitios.nombre')
            ->get();
        $fenofases=Fenofase::selectRaw('fenofases.id_fenofase as id_fenofase')
            ->selectRaw('fenofases.descrip_fenofase as fenofase')
            ->distinct('fenofases.descrip_fenofase')
            ->get();

        $climas=Clima::selectRaw('climas.id_clima as id_clima')
            ->selectRaw('climas.descripcion as clima')
            ->distinct('climas.descripcion')
            ->get();

        $nombre_especies=Individuo::distinct()
            ->pluck("nombre_comun");
        $nombre_especies=($nombre_especies);

        return view('Notas.create', compact('observadores','fenofases','sitios'
            ,'familias','generos','especies','escalas','climas','nombre_especies'));



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)   //TODOS LOS CAMPOS DEL FORMULARIO Y TABLAS RELACIONADAS
    {
         $request->validate([
            'fecha' => 'required',
            'id_observador'=>'3',
            'id_familia'=>'required',
            'id_genero'=>'required',
            'id_especie'=>'required',
            'descripcion'=>'required',
            'nombre_comun'=>'required',
            'uso',
            'id_bbch'=>'required',
            'intensidad_fenofase'=>'required',
            'id_fenofase'=>'required',
            'precipitacion'=>'required',
            'id_clima'=>'required',
            'temperatura_minima'=>'required',
            'temperatura_maxima'=>'required',
            'hallazgos'=>'required',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);


        $subespecies = new Subespecie();       //NUEVO MODELO
        $subespecies->descripcion=$request->descripcion;
        $subespecies->id_especie=$request->id_especie;
        $subespecies->save();
        $id_subespecies= $subespecies->id_subespecie;   //ULTIMO ID DE INSERCIÓN

        $individuos= new Individuo();
        $individuos->nombre_comun=$request->nombre_comun;
        $individuos->uso=$request->uso;
        $individuos->id_genero=$request->id_genero;
        $individuos->id_subespecie=$id_subespecies;
        $individuos->id_familia=$request->id_familia;
        $individuos->id_bbch=$request->id_bbch;
        $individuos->save();
        $id_individuos= $individuos->id_individuo;

        $fecha=$request->fecha;    //SE EXTRAÉ LA FECHA INSERTADA
        $date=Carbon::create($fecha); //OBTIENE LA VARIABLE FECHA INSERTADA
        $year=$date->format("Y");
        $initialDate=Carbon::create($year,1,1);
        $julianDate=$initialDate->diffInDays($date)+1;
        $fechajuliana= $year.$julianDate;

        $notas = new Nota();
        $notas->fecha=$request->fecha;
        $notas->dia_juliano=$fechajuliana;
        $notas->id_observador='3';     //SE ASIGNÁ UN ID ESPECIFICO PERO SE DEBE MODIFICAR PARA MOSTARR EL USUARIO ACTIVO
        $notas->id_individuo=$id_individuos;
        $notas->id_sitio=$request->id_sitio;
        $notas->intensidad_fenofase=$request->intensidad_fenofase;
        $notas->id_fenofase=$request->id_fenofase;
        $notas->precipitacion=$request->precipitacion;
        $notas->id_clima=$request->id_clima;
        $notas->temperatura_minima=$request->temperatura_minima;
        $notas->temperatura_maxima=$request->temperatura_maxima;
        $notas->hallazgos=$request->hallazgos;
        $notas->save();
        $id_notas=$notas->id_nota;

        return redirect('notas')
            ->with('Mensaje','Nota Creada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

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
