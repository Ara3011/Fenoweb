@extends('Template.headerf')
@section('content')


    <form action={{url('/notas/'.$datosnotas->id_nota)}} method="POST">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <input type="hidden" value="{{$datosindividuo->id_individuo}}" name="id_individuo">
        <input type="hidden" value="{{$datossubespecie->id_subespecie}}" name="id_subespecie">

        <div class="row card-body ">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group card card-bodyy align-content-center">
                    <div class="bg-greencard">
                        <h1 class="card-header bg-success text-blanco">Actualizar Nota</h1>
                    </div>
                    <h4 class="text-center">Llenar los campos obligatorios (<a class="text-danger">*</a>)</h4>
                    <center><strong><h3>Observador:</h3></strong>
                        <h2> {{ Auth::user()->name }}  {{ Auth::user()->ap }}  {{ Auth::user()->am }}</h2>

                        <br>
                        <strong class="mt-3"><a class="text-danger">*</a>Fecha:</strong>
                        <input type="date" class="form-formulario ui-datepicker" name="fecha"
                               value="{{date("Y",strtotime($datosnotas->fecha))}}-{{date("m",strtotime($datosnotas->fecha))}}-{{date("d",strtotime($datosnotas->fecha))}}"><br>
                        <strong><a class="text-danger">*</a>Familia:</strong><br>

                        <!--Estilo del select-->
                        <select
                            style="width:300px;border:1px solid #04467E;background-color:#DDFFFF;color:#2D4167;font-size:18px"
                            onchange="this.style.width=100" name="id_familia" id="id_familia">
                            <option value="" disabled selected>Seleccione familia</option>
                            @foreach($familias as $familia)
                                <option
                                    value="{{$familia->id_familia}}" {{$familia->id_familia==$datosindividuo->id_familia?"selected":""}}>{{$familia->familia}}</option>
                            @endforeach
                        </select><br><br>
                        <strong><a class="text-danger">*</a>Género:</strong><br>
                        <!--Estilo del select-->
                        <select
                            style="width:300px;border:1px solid #04467E;background-color:#DDFFFF;color:#2D4167;font-size:18px"
                            onchange="this.style.width=100" name="id_genero" id="id_genero">
                            <option value="" disabled selected>Seleccione género</option>
                            @foreach($generos as $genero)
                                <option
                                    value="{{$genero->id_genero}}" {{$genero->id_genero==$datosindividuo->id_genero?"selected":""}}>{{$genero->genero}}</option>
                            @endforeach
                        </select><br><br>
                        <strong><a class="text-danger">*</a>Especie:</strong><br>
                        <select
                            style="width:300px;border:1px solid #04467E;background-color:#DDFFFF;color:#2D4167;font-size:18px"
                            onchange="this.style.width=100" name="id_especie" id="id_especie">
                            <option value="" disabled selected>Seleccione especie</option>
                            @foreach($especies as $especie)
                                <option
                                    value="{{$especie->id_especie}}" {{$especie->id_especie==$datossubespecie->id_especie?"selected":""}}>{{$especie->especie}}</option>
                            @endforeach
                        </select><br><br>
                        <strong>Subespecie:</strong><br>
                        <input type="text" name="descripcion" class="form-formulario"
                               placeholder="Ingresa nombre de subespecie" value="{{$datossubespecie->descripcion}}"><br>

                        <strong><a class="text-danger">*</a>Nombre Común:</strong><br>
                        <input id="nombre_especies" type="text" name="nombre_comun" class="form-formulario typeahead"
                               placeholder="Ingresa nombre común del individuo"
                               value="{{$datosindividuo->nombre_comun}}"><br>

                        <strong><a class="text-danger">*</a>Uso del individuo:</strong><br>
                        <input type="text" name="uso" class="form-formulario"
                               placeholder="Ingresa algún uso del individuo" value="{{$datosindividuo->uso}}"><br>

                        <strong><a class="text-danger">*</a>Grupo de plantas:</strong><br>
                        <select
                            style="width:300px;border:1px solid #04467E;background-color:#DDFFFF;color:#2D4167;font-size:18px"
                            onchange="this.style.width=100" name="id_bbch" id="id_bbch">
                            <option value="" disabled selected>Seleccione grupo</option>
                            @foreach($escalas as $escala)
                                <option
                                    value="{{$escala->id_bbch}}" {{$escala->id_bbch==$datosindividuo->id_bbch?"selected":""}}>{{$escala->escala}}</option>
                            @endforeach
                        </select><br><br>
                        <strong><a class="text-danger">*</a>Sitio:</strong><br>
                        <select
                            style="width:300px;border:1px solid #04467E;background-color:#DDFFFF;color:#2D4167;font-size:18px"
                            onchange="this.style.width=100" name="id_sitio" id="id_sitio">
                            <option value="" disabled selected>Seleccione un sitio</option>
                            @foreach($sitios as $sitio)
                                <option
                                    value="{{$sitio->id_sitio}}" {{$sitio->id_sitio==$datosnotas->id_sitio?"selected":""}}>{{$sitio->sitio}}</option>
                            @endforeach
                        </select><br><br>
                        <strong><a class="text-danger">*</a>Intensidad Fenofase:</strong><br>
                        <input type="number" min="0" max="100" name="intensidad_fenofase" class="form-formulario"
                               placeholder="1% a 20%" value="{{$datosnotas->intensidad_fenofase}}"><br>
                        <strong><a class="text-danger">*</a>Fenofases:</strong><br>
                        <select
                            style="width:300px;border:1px solid #04467E;background-color:#DDFFFF;color:#2D4167;font-size:18px"
                            onchange="this.style.width=100" name="id_fenofase" id="id_fenofase">
                            <option value="" disabled selected>Seleccione una fenofase</option>
                            @foreach($fenofases as $fenofase)
                                <option
                                    value="{{$fenofase->id_fenofase}}" {{$fenofase->id_fenofase==$datosnotas->id_fenofase?"selected":""}}>{{$fenofase->fenofase}}</option>
                            @endforeach
                        </select>
                        <br><br> <strong>Precipitación:</strong><br>
                        <input type="number" name="precipitacion" class="form-formulario" placeholder="30mm."
                               value="{{$datosnotas->precipitacion}}"><br>

                        <strong><a class="text-danger">*</a>Clima:</strong><br>
                        <select
                            style="width:300px;border:1px solid #04467E;background-color:#DDFFFF;color:#2D4167;font-size:18px"
                            onchange="this.style.width=100" name="id_clima" id="id_clima">
                            <option value="" disabled selected>Seleccione clima</option>
                            @foreach($climas as $clima)
                                <option
                                    value="{{$clima->id_clima}}" {{$clima->id_clima==$datosnotas->id_clima?"selected":""}}>{{$clima->clima}}</option>
                            @endforeach
                        </select>
                        <br><br> <strong>Temperatura minima:</strong>
                        <input type="number" min="-30" max="50" name="temperatura_minima" class="form-formulario"
                               placeholder="-30°C a 50°C" value="{{$datosnotas->temperatura_minima}}">

                        <br><strong>Temperatura máxima:</strong>
                        <input type="number" min="-30" max="50" name="temperatura_maxima" class="form-formulario"
                               placeholder="-30°C a 50°C" value="{{$datosnotas->temperatura_maxima}}">

                        <br> <strong><a class="text-danger">*</a>Hallazgos:</strong><br>
                        <textarea name="hallazgos" id="hallazgos" placeholder="Describe tus observaciones" cols="30"
                                  rows="5">{{$datosnotas->hallazgos}}</textarea><br></center>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success bg-greencard">Actualizar nota</button>
            </div>
        </div>

    </form>

@endsection
@section("scripts")
    <script>

        var availableTutorials = {!!$nombre_especies!!}
        $("#nombre_especies").autocomplete({
            source: availableTutorials
        });
    </script>


    <script type="text/javascript">
        $("#id_sitio",).select2({});
    </script>

    <script type="text/javascript">
        $("#id_bbch",).select2({});
    </script>
    <script type="text/javascript">
        $("#id_familia",).select2({});
    </script>
    <script type="text/javascript">
        $("#id_genero",).select2({});
    </script>
    <script type="text/javascript">
        $("#id_especie",).select2({});
    </script>
    <script type="text/javascript">
        $("#id_fenofase",).select2({});
    </script>
    <script type="text/javascript">
        $("#id_clima",).select2({});
    </script>

@endsection
