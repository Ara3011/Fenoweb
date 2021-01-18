@extends('Template.headerf')
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

        <div class="row card-bodyy">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group card card-body">
                   <center> <strong><a class="text-danger">*</a>Sitio:</strong><br>
                    <input type="text" name="nombre" class="form-catalogo" placeholder="Ecribe nombre del sitio">
                    <strong><a class="text-danger">*</a>Comunidad:</strong><br>
                    <input type="text" name="comunidad" class="form-catalogo" placeholder="Ecribe nombre de la comunidad">
                    <strong><a class="text-danger">*</a>Latitud:</strong><br>
                    <input type="number" min="0" max="1000.99" step="0.01" name="latitud" class="form-catalogo" placeholder="19.48°">
                    <strong><a class="text-danger">*</a>Longitud:</strong><br>
                    <input type="number" min="-1000.99" max="0" step="0.01" name="longitud" class="form-catalogo" placeholder="-100.27°">
                    <strong><a class="text-danger">*</a>Altitud:</strong><br>
                    <input type="number" name="altitud" class="form-catalogo" placeholder="2256m">

                    <strong><a class="text-danger">*</a>Municipios:</strong><br>
                    <select name="id_municipio" id="id_municipio">
                        <option value="" disabled selected>Seleccione un municipio</option>
                        @foreach($municipios as $municipio)
                            <option value={{$municipio->id_municipio}}>{{$municipio->municipio}}</option>
                        @endforeach
                    </select></center>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Crear sitio</button>
            </div>
        </div>
    </form>
    <br>
@endsection
@section("scripts")

    <script type="text/javascript">
        $("#id_municipio").select2({
        });
    </script>


@endsection
