@extends('Template.headerf')
@section('content')

    <form action={{url('/sitios/'.$datossitios->id_sitio)}} method="POST">
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row card-bodyy">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group card card-body">

                    <center><strong>Sitio:</strong><br>
                        <input type="text" name="nombre" class="form-catalogo" placeholder="Ecribe nombre del sitio"
                               value="{{$datossitios->nombre}}">
                        <strong>Comunidad:</strong><br>
                        <input type="text" name="comunidad" class="form-catalogo"
                               placeholder="Ecribe nombre de la comunidad" value="{{$datossitios->comunidad}}">
                        <strong>Latitud:</strong><br>
                        <input type="number" min="0" max="1000.99" step="0.01" name="latitud" class="form-catalogo"
                               placeholder="19.48°" value="{{$datossitios->latitud}}">
                        <strong>Longitud:</strong><br>
                        <input type="number" min="-1000.99" max="0" step="0.01" name="longitud" class="form-catalogo"
                               placeholder="-100.27°" value="{{$datossitios->longitud}}">
                        <strong>Altitud:</strong><br>
                        <input type="number" name="altitud" class="form-catalogo" placeholder="2256m"
                               value="{{$datossitios->altitud}}">
                        <strong>Municipios:</strong><br>
                        <select name="id_municipio" id="id_municipio">
                            <option value="" disabled selected>Seleccione un municipio</option>
                            @foreach($municipios as $municipio)
                                <option value={{$municipio->id_municipio}}>{{$municipio->municipio}}</option>
                            @endforeach
                        </select></center>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar sitio</button>
            </div>
        </div>
    </form>
    <br>
@endsection
@section('scripts')
    <script type="text/javascript">
        $("#id_municipio",).select2({});
    </script>
@endsection
