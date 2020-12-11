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

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group card card-body mt-2" style="width: 920px; left: 310px">
                    <h1 class="card-header bg-success text-light"  >Formulario Notas</h1>

                    <strong>Observador:</strong><br>
                    @foreach($observadores as $observador)
                    <h4>{{$observador->nombre}}</h4>
                    @endforeach


                    <strong class="mt-3">Fecha:</strong>
                    <input type="date" class="form-control datepicker" name="fecha">
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
                    <input id="nombre_individuos" type="text" name="nombre_comun" class="form-control typeahead" placeholder="Ingresa nombre común del individuo">

                    <strong>Uso del individuo:</strong><br>
                    <input type="text" name="uso" class="form-control" placeholder="Ingresa algún uso del individuo">

                    <strong>Grupo de plantas:</strong><br>
                    <select name="id_bbch" id="id_bbch">
                        <option value="" disabled selected>Seleccione especie</option>
                        @foreach($escalas as $escala)
                            <option value={{$escala->id_bbch}}>{{$escala->escala}}</option>
                        @endforeach
                    </select>
                    <strong>Sitios:</strong><br>
                    <select name="id_sitio" id="id_sitio">
                        <option value="" disabled selected>Seleccione un sitio</option>
                        @foreach($sitios as $sitio)
                            <option value={{$sitio->id_sitio}}>{{$sitio->sitio}}</option>
                        @endforeach
                    </select>
                    <strong>Intensidad Fenofase:</strong><br>
                    <input type="number" min="0" max="100" name="intensidad_fenofase" class="form-control" placeholder="1% a 20%">
                    <strong>Fenofases:</strong><br>
                    <select name="id_fenofase" id="id_fenofase">
                        <option value="" disabled selected>Seleccione una fenofase</option>
                        @foreach($fenofases as $fenofase)
                            <option value={{$fenofase->id_fenofase}}>{{$fenofase->fenofase}}</option>
                        @endforeach
                    </select>
                    <strong>Precipitación:</strong><br>
                    <input type="number" name="precipitacion" class="form-control" placeholder="30mm.">

                    <strong>Climas:</strong><br>
                    <select name="id_clima" id="id_clima">
                        <option value="" disabled selected>Seleccione clima</option>
                        @foreach($climas as $clima)
                            <option value={{$clima->id_clima}}>{{$clima->clima}}</option>
                        @endforeach
                    </select>
                    <strong>Temperatura minima:</strong>
                    <input type="number"  min="-30" max="50" name="temperatura_minima" class="form-control" placeholder="-30°C a 50°C">

                    <strong>Temperatura máxima:</strong>
                    <input type="number" min="-30" max="50" name="temperatura_maxima" class="form-control" placeholder="-30°C a 50°C">

                    <strong>Hallazgos:</strong><br>
                    <textarea name="hallazgos" id="hallazgos" placeholder="Describe tus observaciones" cols="30" rows="5"></textarea><br>


                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center"style="left: 250px;">
                <button type="submit" class="btn btn-success"style="width: 200px;" >Crear</button>
            </div>
        </div>

    </form>


@section("scripts")

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

