@extends('Template.headfoot')
@section('content')


    <div class="container-fluid" >

        <div class="col-md-12">
            <div class="card mt-2" style="height:620px;
                     width:1500px;">
                <div class="card-header bg-success" style="width: 1500px;">

                    <h4 class="card-title text-center"style="width: 1500px; ">Notas</h4>
                </div>

                <div class="">


                    <div class="dataTables_wrapper dt-bootstrap4" style=" overflow:scroll;
                    height:570px;
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
                                    @foreach($datosnotas as $datosnota)
                                        <tr role="row" class="odd">
                                            <td>{{$datosnota->fecha}}</td>
                                            <td>{{$datosnota->dia_juliano}}</td>
                                            <td>{{$datosnota->observador}}</td>
                                            <td>{{$datosnota->nombre_comun}}</td>
                                            <td>{{$datosnota->familia}}</td>
                                            <td>{{$datosnota->genero}}</td>
                                            <td>{{$datosnota->especie}}</td>
                                            <td>{{$datosnota->subespecies}}</td>
                                            <td>{{$datosnota->escala_bbch}}</td>
                                            <td>{{$datosnota->sitio}}</td>
                                            <td>{{$datosnota->comunidad}}</td>
                                            <td>{{$datosnota->municipio}}</td>
                                            <td>{{$datosnota->estado}}</td>
                                            <td>{{$datosnota->latitud}}</td>
                                            <td>{{$datosnota->longitud}}</td>
                                            <td>{{$datosnota->altitud}}</td>
                                            <td>{{$datosnota->fenofase}}</td>
                                            <td>{{$datosnota->int_feno}}</td>
                                            <td>{{$datosnota->precipitacion}}</td>
                                            <td>{{$datosnota->temperatura_minima}}</td>
                                            <td>{{$datosnota->temperatura_maxima}}</td>
                                            <td>{{$datosnota->nota}}</td>

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
<div class="card">
        <span >
            {{ $datosnotas->links('pagination::bootstrap-4') }}
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

