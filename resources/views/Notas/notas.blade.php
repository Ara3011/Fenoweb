@extends('Template.headfoot')
@section('content')


    <div class="container-fluid" >
        @if(Session::has('Mensaje'))
            <div class="alert alert-secondary text-center alert-dismissible text-uppercase"style="left: 197px">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="glyphicon glyphicon-ok"></span><em> {!! session('Mensaje') !!}</em></div>
        @endif
        <div class="col-md-12">

            <div class="card mt-2" style="height:620px;
                     width:1500px;">
                <div class="card-header bg-success" style="width: 1500px;">

                    <h4 class="card-title text-center"style="width: 1500px; ">Notas</h4>
                </div>

                <div class="">

                    <div>
                        <center>
                            <form class="form-group form mt-2">
                                <i class="fas fa-search" aria-hidden="true"></i>
                                <label for="buscar_observador" class="text-dark"><h4>Buscar: </h4></label>
                                <input name="buscar_observador" class="form-control form-control-sm ml-3 w-75" type="text"
                                       placeholder="Buscar observador"
                                       aria-label="buscar_observador" >
                            </form>
                        </center>
                    </div>

                    <div class="dataTables_wrapper dt-bootstrap4" style=" overflow:scroll;
                    height:480px;
                     width:1500px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table dataTable"
                                       role="grid" aria-describedby="example1_info">
                                    <thead class="thead-light">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Fecha
                                        </th>

                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Día
                                            Juliano
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Observador
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Nombre
                                            Común
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Familia
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Género
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Especie
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Subespecie
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Escala
                                            BBCH
                                        </th>

                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Sitio
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Comunidad
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Municipio
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Estado
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Latitud
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Longitud
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Altitud
                                        </th>

                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Fenofase
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Intensidad
                                            de la Fenofase
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Precipitación
                                        </th>

                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Temperatura minima
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Temperatura máxima
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Hallazgo
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach($notas as $nota)
                                        <tr role="row" class="odd">
                                            <td>{{$nota->fecha}}</td>
                                            <td>{{$nota->dia_juliano}}</td>
                                            <td>{{$nota->observador}}</td>
                                            <td>{{$nota->nombre_comun}}</td>
                                            <td>{{$nota->familia}}</td>
                                            <td>{{$nota->genero}}</td>
                                            <td>{{$nota->especie}}</td>
                                            <td>{{$nota->subespecies}}</td>
                                            <td>{{$nota->escala_bbch}}</td>
                                            <td>{{$nota->sitio}}</td>
                                            <td>{{$nota->comunidad}}</td>
                                            <td>{{$nota->municipio}}</td>
                                            <td>{{$nota->estado}}</td>
                                            <td>{{$nota->latitud}}</td>
                                            <td>{{$nota->longitud}}</td>
                                            <td>{{$nota->altitud}}</td>
                                            <td>{{$nota->fenofase}}</td>
                                            <td>{{$nota->int_feno}}</td>
                                            <td>{{$nota->precipitacion}}</td>
                                            <td>{{$nota->temperatura_minima}}</td>
                                            <td>{{$nota->temperatura_maxima}}</td>
                                            <td>{{$nota->nota}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>
        </div>
    </div>
<div class="">
        <span >
            {{ $notas->links('pagination::bootstrap-4') }}
        </span>
</div>
        <style>
            .w-5 {
                display: none;
            }
        </style>

@endsection
@section("scripts")
    <script type="text/javascript">

    </script>
@endsection

