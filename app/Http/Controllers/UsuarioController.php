<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Auth;
use App\Models\User;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const Paginacion=10;
    public function index(Request $request)
    {
        $rol=User::
            selectRaw('users.tipo_usuario as rol')
            ->get();

        $buscar_usuario= $request->input('buscar_usuario');
        $usuarios=User::selectRaw('users.id as id_usuario')
            ->where('users.name','like','%'.$buscar_usuario.'%')
            ->selectRaw('users.name as nombre')
            ->selectRaw('users.ap as ap')
            ->selectRaw('users.am as am')
            ->selectRaw('users.email as correo')
            ->selectRaw('users.tipo_usuario as rol')
            ->distinct('users.email')
            ->paginate($this::Paginacion);

        return view('Usuarios.index', compact('usuarios','buscar_usuario','rol'));
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
    public function show(Request $request)
    {
        $rol=User::
        selectRaw('users.tipo_usuario as rol')
            ->get();

        $usuarios=User::selectRaw('users.id as id_usuario')
            ->where('id','=',Auth::user()->id)
            ->selectRaw('users.name as nombre')
            ->selectRaw('users.ap as ap')
            ->selectRaw('users.am as am')
            ->selectRaw('users.email as correo')
            ->distinct('users.email')
            ->paginate($this::Paginacion);

        return view('Usuarios.mi_perfil', compact('usuarios','rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datosusuario= User::findOrFail($id);


        return view('Usuarios.edit ', compact('datosusuario'));

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
        $datosusuario=request()->except(['_token','_method']);
        User::where('id','=',$id)->update($datosusuario);

        if(Auth::user()->tipo_usuario == 1) {
            return redirect('usuarios')
                ->with('Mensaje', 'Usuario Actualizado Con éxito');
        }
        else{
            return redirect('usuarios/show')
                ->with('Mensaje', 'Datos Actualizados Con éxito');
        }
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
