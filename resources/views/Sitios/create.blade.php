@extends('Template.headfoot')
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/sitios" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"style="left: 600px">
                <div class="form-group card card-body">
                    <strong>Sitio:</strong><br>
                    <input type="text" name="nombre" class="form-control" placeholder="Ecribe nombre del sitio">
                    <strong>Comunidad:</strong><br>
                    <input type="text" name="comunidad" class="form-control" placeholder="Ecribe nombre de la comunidad">
                    <strong>Latitud:</strong><br>
                    <input type="number" min="0" max="1000.99" step="0.01" name="latitud" class="form-control" placeholder="19.48°">
                    <strong>Longitud:</strong><br>
                    <input type="number" min="-1000.99" max="0" step="0.01" name="longitud" class="form-control" placeholder="-100.27°">
                    <strong>Altitud:</strong><br>
                    <input type="number" name="altitud" class="form-control" placeholder="2256m">

                    <strong>Municipios:</strong><br>
                    <select name="id_municipio" id="id_municipio">
                        <option value="" disabled selected>Seleccione un municipio</option>
                        @foreach($municipios as $municipio)
                            <option value={{$municipio->id_municipio}}>{{$municipio->municipio}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center"style="left: 600px">
                <button type="submit" class="btn btn-success">Crear</button>
            </div>
        </div>

    </form>
@endsection
@section("scripts")

    <script type="text/javascript">
        $("#id_municipio").select2({
        });
    </script>


@endsection
