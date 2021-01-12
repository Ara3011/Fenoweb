@extends('Template.headfoot')
@section('content')



    <form action={{url('/notas/'.$datosnotas->id_nota)}} method="POST" >
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="row ">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group card card-body mt-2" style="width: 920px; left: 310px">
                    <h1 class="card-header bg-success text-light"  >Registro de Observaciones</h1>
                    <h6 class="text-center">Llenar los campos obligatorios (<a class="text-danger">*</a>)</h6>
                    <strong>Observador:</strong><br>
                    @foreach($observadores as $observador)
                        <h4>{{$observador->nombre}}</h4>
                    @endforeach


                    <strong class="mt-3"><a class="text-danger">*</a>Fecha:</strong>
                    <input type="date" class="form-control datepicker" name="fecha" value="{{$datosnotas->fecha}}">

                    <strong><a class="text-danger">*</a>Familia:</strong><br>
                    <select name="id_familia" id="id_familia">
                        <option value="" disabled selected>Seleccione familia</option>
                        @foreach($familias as $familia)
                            <option value={{$familia->id_familia}}>{{$familia->familia}}</option>
                        @endforeach
                    </select>
                    <strong><a class="text-danger">*</a>Género:</strong><br>
                    <select name="id_genero" id="id_genero">
                        <option value="" disabled selected>Seleccione género</option>
                        @foreach($generos as $genero)
                            <option value={{$genero->id_genero}}>{{$genero->genero}}</option>
                        @endforeach
                    </select>
                    <strong><a class="text-danger">*</a>Especie:</strong><br>
                    <select name="id_especie" id="id_especie">
                        <option value="" disabled selected>Seleccione especie</option>
                        @foreach($especies as $especie)
                            <option value={{$especie->id_especie}}>{{$especie->especie}}</option>
                        @endforeach
                    </select>
                    <strong>Subespecie:</strong><br>
                    <input type="text" name="descripcion" class="form-control" placeholder="Ingresa nombre de subespecie" value="{{$datosnotas->descripcion}}">

                    <strong><a class="text-danger">*</a>Nombre Común:</strong><br>
                    <input id="nombre_especies" type="text" name="nombre_comun" class="form-control typeahead" placeholder="Ingresa nombre común del individuo" value="{{$datosnotas->nombre_comun}}">

                    <strong><a class="text-danger">*</a>Uso del individuo:</strong><br>
                    <input type="text" name="uso" class="form-control" placeholder="Ingresa algún uso del individuo"value="{{$datosnotas->uso}}">

                    <strong><a class="text-danger">*</a>Grupo de plantas:</strong><br>
                    <select name="id_bbch" id="id_bbch">
                        <option value="" disabled selected>Seleccione grupo</option>
                        @foreach($escalas as $escala)
                            <option value={{$escala->id_bbch}}>{{$escala->escala}}</option>
                        @endforeach
                    </select>
                    <strong><a class="text-danger">*</a>Sitio:</strong><br>
                    <select name="id_sitio" id="id_sitio">
                        <option value="" disabled selected>Seleccione un sitio</option>
                        @foreach($sitios as $sitio)
                            <option value={{$sitio->id_sitio}}>{{$sitio->sitio}}</option>
                        @endforeach
                    </select>
                    <strong><a class="text-danger">*</a>Intensidad Fenofase:</strong><br>
                    <input type="number" min="0" max="100" name="intensidad_fenofase" class="form-control" placeholder="1% a 20%"value="{{$datosnotas->intensidad_fenofase}}">
                    <strong><a class="text-danger">*</a>Fenofases:</strong><br>
                    <select name="id_fenofase" id="id_fenofase">
                        <option value="" disabled selected>Seleccione una fenofase</option>
                        @foreach($fenofases as $fenofase)
                            <option value={{$fenofase->id_fenofase}}>{{$fenofase->fenofase}}</option>
                        @endforeach
                    </select>
                    <strong>Precipitación:</strong><br>
                    <input type="number" name="precipitacion" class="form-control" placeholder="30mm."value="{{$datosnotas->precipitacion}}">

                    <strong><a class="text-danger">*</a>Clima:</strong><br>
                    <select name="id_clima" id="id_clima">
                        <option value="" disabled selected>Seleccione clima</option>
                        @foreach($climas as $clima)
                            <option value={{$clima->id_clima}}>{{$clima->clima}}</option>
                        @endforeach
                    </select>
                    <strong>Temperatura minima:</strong>
                    <input type="number"  min="-30" max="50" name="temperatura_minima" class="form-control" placeholder="-30°C a 50°C"value="{{$datosnotas->temperatura_minima}}">

                    <strong>Temperatura máxima:</strong>
                    <input type="number" min="-30" max="50" name="temperatura_maxima" class="form-control" placeholder="-30°C a 50°C"value="{{$datosnotas->temperatura_maxima}}">

                    <strong><a class="text-danger">*</a>Hallazgos:</strong><br>
                    <textarea name="hallazgos" id="hallazgos" placeholder="Describe tus observaciones" cols="30" rows="5"value="{{$datosnotas->hallazgos}}"></textarea><br>


                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center"style="left: 250px;">
                <button type="submit" class="btn btn-success"style="width: 200px;" >Crear Nota</button>
            </div>
        </div>

    </form>


@section("scripts")
    <script>

        var availableTutorials  = {!!$nombre_especies!!}
        $( "#nombre_especies" ).autocomplete({
            source: availableTutorials
        });
    </script>


    <script type="text/javascript">
        $("#id_sitio",).select2({
        });
    </script>

    <script type="text/javascript">
        $("#id_bbch",).select2({
        });
    </script>
    <script type="text/javascript">
        $("#id_familia",).select2({
        });
    </script>
    <script type="text/javascript">
        $("#id_genero",).select2({
        });
    </script>
    <script type="text/javascript">
        $("#id_especie",).select2({
        });
    </script>
    <script type="text/javascript">
        $("#id_fenofase",).select2({
        });
    </script>
    <script type="text/javascript">
        $("#id_clima",).select2({
        });
    </script>


@endsection


@endsection
