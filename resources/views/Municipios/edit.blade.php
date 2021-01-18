@extends('Template.headerf')
@section('content')

    <form action={{url('/municipios/'.$datosmunicipios->id_municipio)}} method="POST" >
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row card-bodyy">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group card card-body">
                    <center><strong>Nombre del municipio:</strong><br>
                    <input type="text" name="nombre" class="form-catalogo" placeholder="Nombre" value="{{$datosmunicipios->nombre}}"><br>
                    <strong>Estado:</strong><br>
                    <select name="id_estado" id="id_estado">
                        <option value="" disabled selected>Seleccione un estado</option>
                        @foreach($estados as $estado)
                            <option value={{$estado->id}}>{{$estado->estado}}</option>
                        @endforeach
                    </select></center>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar municipio</button>
            </div>
        </div>
    </form>
    <br>
@endsection
@section('scripts')
    <script type="text/javascript">
        $("#id_estado",).select2({
        });
    </script>
@endsection
