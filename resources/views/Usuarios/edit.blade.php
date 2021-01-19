@extends('Template.headerf')
@section('content')

    <form action={{url('/usuarios/'.$datosusuario->id)}} method="POST" >
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row card-bodyy">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group card card-body">
                    <center><strong>Nombre:</strong><br>
                    <input type="text" name="name" class="form-catalogo" placeholder="Nombre" value="{{$datosusuario->name}}"><br>
                        <strong>Apellido paterno:</strong><br>
                        <input type="text" name="ap" class="form-catalogo" placeholder="Apellido paterno" value="{{$datosusuario->ap}}"><br>
                        <strong>Apellido materno:</strong><br>
                        <input type="text" name="am" class="form-catalogo" placeholder="Apellido materno" value="{{$datosusuario->am}}"><br>
                        <strong>Correo electrónico:</strong><br>
                        <input type="text" name="email" class="form-catalogo" placeholder="Correo electrónico" value="{{$datosusuario->email}}"><br>
                        @if(Auth::user()->tipo_usuario == 1)
                    <strong>Rol:</strong><br>
                    <select name="tipo_usuario" id="tipo_usuario">
                        <option value="" disabled selected>Seleccione rol de usuario</option>
                            <option value=1>Administrador</option>
                        <option value=2>Observador</option>
                    </select>@endif</center>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar usuario</button>
            </div>
        </div>
    </form>
    <br>
@endsection
@section('scripts')

@endsection
