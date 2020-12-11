@extends('Template.headfoot')
@section('content')

    <form action={{url('/municipios/'.$datosmunicipios->id_municipio)}} method="POST" >
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"style="left: 600px">
                <div class="form-group card card-body">
                    <strong>Nombre del municipio:</strong><br>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{$datosmunicipios->nombre}}"><br>
                    <strong>Estado:</strong><br>
                    <select name="id_estado" id="id_estado">
                        <option value="" disabled selected>Seleccione un estado</option>
                        @foreach($estados as $estado)
                            <option value={{$estado->id}}>{{$estado->estado}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center"style="left: 600px">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar</button>
            </div>
        </div>

    </form>
@endsection
@section('scripts')
    <script type="text/javascript">
        $("#id_estado",).select2({
        });
    </script>
@endsection
