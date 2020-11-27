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
    <form action="/notas" method="POST" >
        @csrf

        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12"style="left: 600px">
                <div class="form-group card card-body" style="width: 800px; right: 220px">
                    <strong>Día Juliano:</strong>
                    <input type="text" name="dia_juliano" class="form-control" placeholder="2014323">
                    <strong>Observadores:</strong><br>
                    <select name="id_observador" id="id_observador">
                        <option value="" disabled selected>Seleccione un observador</option>
                        @foreach($observadores as $observador)
                            <option value={{$observador->id_observador}}>{{$observador->nombre}}</option>
                        @endforeach
                    </select>
                    <strong>Familias:</strong><br>
                    <select name="id_familia" id="id_familia">
                        <option value="" disabled selected>Seleccione familia</option>
                        @foreach($familias as $familia)
                            <option value={{$familia->id_familia}}>{{$familia->familia}}</option>
                        @endforeach
                    </select>
                    <strong>Géneros:</strong><br>
                    <select name="id_genero" id="id_genero">
                        <option value="" disabled selected>Seleccione género</option>
                        @foreach($generos as $genero)
                            <option value={{$genero->id_genero}}>{{$genero->genero}}</option>
                        @endforeach
                    </select>
                    <strong>Especies:</strong><br>
                    <select name="id_especie" id="id_especie">
                        <option value="" disabled selected>Seleccione especie</option>
                        @foreach($especies as $especie)
                            <option value={{$especie->id_especie}}>{{$especie->especie}}</option>
                        @endforeach
                    </select>
                    <strong>Subespecies:</strong><br>
                    <input type="text" name="descripcion" class="form-control" placeholder="Ingresa nombre de subespecie">

                    <strong>Individuos:</strong><br>
                    <input type="text" name="nombre_comun" class="form-control" placeholder="Ingresa nombre común del individuo">

                    <strong>Grupo de plantas:</strong><br>
                    <select name="id_bbch" id="id_bbch">
                        <option value="" disabled selected>Seleccione especie</option>
                        @foreach($escalas as $escala)
                            <option value={{$escala->id_bbch}}>{{$escala->escala}}</option>
                        @endforeach
                    </select>

                    <strong>Sitio:</strong><br>
                    <input type="text" name="nombre" class="form-control" placeholder="Ecribe nombre del sitio">
                    <strong>Comunidad:</strong><br>
                    <input type="text" name="comunidad" class="form-control" placeholder="Ecribe nombre de la comunidad">
                    <strong>Latitud:</strong><br>
                    <input type="number" name="latitud" class="form-control" placeholder="19.48593056">
                    <strong>Longitud:</strong><br>
                    <input type="number" name="longitud" class="form-control" placeholder="100.2797278">
                    <strong>ALtitud:</strong><br>
                    <input type="number" name="altitud" class="form-control" placeholder="2256">

                    <strong>Municipios:</strong><br>
                    <select name="id_municipio" id="id_municipio">
                        <option value="" disabled selected>Seleccione un municipio</option>
                        @foreach($municipios as $municipio)
                            <option value={{$municipio->id_municipio}}>{{$municipio->municipio}}</option>
                        @endforeach
                    </select>
                    <strong>Intensidad Fenofase:</strong><br>
                    <input type="number" name="intensidad_fenofase" class="form-control" placeholder="">
                    <strong>Fenofases:</strong><br>
                    <select name="id_fenofase" id="id_fenofase">
                        <option value="" disabled selected>Seleccione una fenofase</option>
                        @foreach($fenofases as $fenofase)
                            <option value={{$fenofase->id_fenofase}}>{{$fenofase->fenofase}}</option>
                        @endforeach
                    </select>
                    <strong>Precipitación:</strong><br>
                    <input type="number" name="precipitacion" class="form-control" placeholder="">

                    <strong>Climas:</strong><br>
                    <select name="id_clima" id="id_clima">
                        <option value="" disabled selected>Seleccione clima</option>
                        @foreach($climas as $clima)
                            <option value={{$clima->id_clima}}>{{$clima->clima}}</option>
                        @endforeach
                    </select>
                    <strong>Temperatura minima:</strong>
                    <input type="number" name="temperatura_minima" class="form-control" placeholder="">

                    <strong>Temperatura máxima:</strong>
                    <input type="number" name="temperatura_maxima" class="form-control" placeholder="">

                    <strong>Hallazgos:</strong><br>
                    <textarea name="hallazgos" id="hallazgos" placeholder="Describe tus observaciones" cols="30" rows="5"></textarea><br>


                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center"style="left: 250px;">
                <button type="submit" class="btn btn-success"style="width: 200px;" >Crear</button>
            </div>
        </div>

    </form>
@endsection
