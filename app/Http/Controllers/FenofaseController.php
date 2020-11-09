<?php

namespace App\Http\Controllers;

use App\Models\Fenofase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class FenofaseController extends Controller
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
        $fenofases=Fenofase::where('descrip_fenofase','like','%'.$buscar.'%')->paginate($this::Paginacion);
        return view('fenofases.index',compact('fenofases','buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fenofases.create');
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
            'descrip_fenofase' => 'required',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        Fenofase::create($request->all());

        return redirect()->route('fenofases.index')
            ->with('Mensaje','Fenofase Creada Con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fenofase  $fenofase
     * @return \Illuminate\Http\Response
     */
    public function show(Fenofase $fenofase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fenofase  $fenofase
     * @return \Illuminate\Http\Response
     */
    public function edit($id_fenofase)
    {
        $fenofase= Fenofase::findOrFail($id_fenofase);
        return view('fenofases.edit ', compact('fenofase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fenofase  $fenofase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_fenofase)
    {
    $datosFenofase=request()->except(['_token','_method']);
    Fenofase::where('id_fenofase','=',$id_fenofase)->update($datosFenofase);



        return redirect()->route('fenofases.index')
        ->with('Mensaje','Fenofase Actualizada Con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fenofase  $fenofase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fenofase $fenofase)
    {

        $fenofase->delete();

        return redirect()->route('fenofases.index')
            ->with('Mensaje','Fenofase Eliminada Con éxito');
    }
}
