@extends('Template.headerf')
@section('content')

    <div class="container-fluid">
        @if(Session::has('Mensaje'))
            <div class="alert bg-gris  text-center alert-dismissible text-uppercase">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="glyphicon glyphicon-ok"></span><em> {!! session('Mensaje') !!}</em></div>
        @endif
        <div class="col-md-2 mt-3" >

            <button class="btn bg-greencard" >
                <a href="{{url('/sitios/create')}}">
                    <i class="material-icons text-blanco">loupe</i><i class="text-blanco">Agregar sitio</i>
                </a>
            </button>
        </div>

        <div class="col-md-12" >
            <div class="card">
                <div class="bg bg-greencard">

                    <h4 class="card-header text-blanco">Sitios</h4>
                </div>
                <div class="card-bodyy">
                    <div>
                        <center>
                            <form class="form-group form mt-2">
                                <i class="fas fa-search" aria-hidden="true"></i>
                                <label for="buscar_sitio" class="text-dark"><h4>Filtro de búsqueda: </h4></label>
                                <input name="buscar_sitio" class="form-catalogo form-control-sm ml-3 w-75" type="text"
                                       placeholder="Buscar Sitio"
                                       aria-label="buscar sitio" >
                            </form>
                        </center>
                    </div>


                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

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
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Acciones
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach($datossitios as $datossitio)
                                        <tr role="row" class="odd">
                                            <td>{{$datossitio->sitio}}</td>
                                            <td>{{$datossitio->comunidad}}</td>
                                            <td>{{$datossitio->latitud}}</td>
                                            <td>{{$datossitio->longitud}}</td>
                                            <td>{{$datossitio->altitud}}</td>
                                            <td>{{$datossitio->municipio}}</td>
                                            <td>{{$datossitio->estado}}</td>
                                            <td>
                                                <form method="post"
                                                      action="{{url('/sitios/'.$datossitio->id_sitio)}}">
                                                    <!-- Actualizar -->
                                                    {{csrf_field()}}
                                                    <button type="button" rel="tooltip"
                                                            class="btn btn-success btn-limon text-blanco ">
                                                        <a class="text-blanco"
                                                           href="{{url('/sitios/'.$datossitio->id_sitio.'/edit')}}"><i
                                                                class="material-icons text-blanco ">edit</i></a>
                                                    </button>
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <!-- BORRAR -->
                                                    <button type="submit" rel="tooltip"
                                                            class="btn btn-danger rounded-circle " onclick="return confirm('¿Está seguro que desea eliminar?');">
                                                        <i class="material-icons"
                                                           onclick="return confirm('¿Está seguro que desea eliminar?');">restore_from_trash</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="text-center">
        <span >
            {{ $datossitios->links('pagination::bootstrap-4') }}
        </span>
            </div>
            <style>
                .w-5 {
                    display: none;
                }
            </style>
        </div>
        </div>
@endsection
