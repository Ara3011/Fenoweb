<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class InsigniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const Paginacion=1;
    public function index()
    {
        $insignias=User::selectRaw('users.id as id_usuario')
            ->where('id','=',Auth::user()->id)
            ->selectRaw('users.insignias as insignia')
            ->get();

        $fecha=Nota::join('users','users.id','=','notas.id_observador')
        ->selectRaw('notas.id_nota as id_nota')
            ->where('id','=',Auth::user()->id)
            ->selectRaw('notas.fecha as fecha')
            ->OrderBy('fecha','DESC')
            ->paginate($this::Paginacion);

        return view('Insignias.index', compact('insignias','fecha'));
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
