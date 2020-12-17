@extends('Template.headfoot')
@section('content')

    <form action={{url('/sitios/'.$datossitios->id_sitio)}} method="POST" >
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"style="left: 500px">
                <div class="form-group card card-body">

                    <strong>Sitio:</strong><br>
                    <input type="text" name="nombre" class="form-control" placeholder="Ecribe nombre del sitio"value="{{$datossitios->nombre}}">
                    <strong>Comunidad:</strong><br>
                    <input type="text" name="comunidad" class="form-control" placeholder="Ecribe nombre de la comunidad"value="{{$datossitios->comunidad}}">
                    <strong>Latitud:</strong><br>
                    <input type="number" min="0" max="1000.99" step="0.01" name="latitud" class="form-control" placeholder="19.48°"value="{{$datossitios->latitud}}">
                    <strong>Longitud:</strong><br>
                    <input type="number" min="-1000.99" max="0" step="0.01" name="longitud" class="form-control" placeholder="-100.27°"value="{{$datossitios->longitud}}">
                    <strong>Altitud:</strong><br>
                    <input type="number" name="altitud" class="form-control" placeholder="2256m"value="{{$datossitios->altitud}}">
                    <strong>Municipios:</strong><br>
                    <select name="id_municipio" id="id_municipio">
                        <option value="" disabled selected>Seleccione un municipio</option>
                        @foreach($municipios as $municipio)
                            <option value={{$municipio->id_municipio}}>{{$municipio->municipio}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center"style="left: 500px">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar</button>
            </div>
        </div>

    </form>
@endsection
@section('scripts')
    <script type="text/javascript">
        $("#id_municipio",).select2({
        });
    </script>
@endsection
