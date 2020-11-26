@extends('Template.headfoot')
@section('content')

    <div class="container-fluid">

        <div class="col-12" style="left: 197px">
            <div class="card">
                <div class="card-header bg-success">

                    <h4 class="card-title">Individuos</h4>
                </div>
                <div class="card-body">
                    <div>
                        <center>
                            <form class="form-group form mt-2">
                                <i class="fas fa-search" aria-hidden="true"></i>
                                <label for="buscar" class="text-dark"><h4>Buscar: </h4></label>
                                <input name="buscar" class="form-control form-control-sm ml-3 w-75" type="text"
                                       placeholder="Buscar Clima"
                                       aria-label="buscar" >
                            </form>
                        </center>
                    </div>


                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <!--  <center>
                             <div>
                                 <div class="col-sm-12 col-md-6">
                                     <div class="dataTables_length" id="example1_length">
                                         <label><h4>Número de resultados</h4> <select
                                                 name="example1_length" aria-controls="example1"
                                                 class="custom-select custom-select-sm form-control form-control-sm text-center">
                                                 <option value="10">10</option>
                                                 <option value="25">25</option>
                                                 <option value="50">50</option>
                                                 <option value="100">100</option>
                                             </select> </label></div>
                                 </div>

                             </div>
                         </center>-->
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table dataTable"
                                       role="grid" aria-describedby="example1_info">
                                    <thead class="thead-light">
                                    <tr role="row">

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
                                            aria-label="Rendering engine: activate to sort column descending">Municipio
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Estado
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach($datossitio as $datossitios)
                                        <tr role="row" class="odd">
                                            <td>{{$datossitios->sitio}}</td>
                                            <td>{{$datossitios->comunidad}}</td>
                                            <td>{{$datossitios->latitud}}</td>
                                            <td>{{$datossitios->longitud}}</td>
                                            <td>{{$datossitios->altitud}}</td>
                                            <td>{{$datossitios->municipio}}</td>
                                            <td>{{$datossitios->estado}}</td>

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
@endsection
