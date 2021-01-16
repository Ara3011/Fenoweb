@extends('Template.headerf')
@section('content')

    <div class="container-fluid">

        @if(Session::has('Mensaje'))
            <div class="alert alert-secondary text-center alert-dismissible text-uppercase">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="glyphicon glyphicon-ok"></span><em> {!! session('Mensaje') !!}</em></div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success">

                    <h4 class="card-title">Usuarios</h4>
                </div>
                <div class="card-body">
                    <div>
                        <center>
                            <form class="form-group form mt-2">
                                <i class="fas fa-search" aria-hidden="true"></i>
                                <label for="buscar_usuario" class="text-dark"><h4>Buscar: </h4></label>
                                <input name="buscar_usuario" class="form-control form-control-sm ml-3 w-75" type="text"
                                       placeholder="Buscar Usuario"
                                       aria-label="buscar_usuario" >
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
                                            aria-label="Rendering engine: activate to sort column descending">Nombre
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Apellido Paterno
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Apellido Materno
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Email
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Rol
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Acciones
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr role="row" class="odd">
                                            <td>{{$usuario->nombre}}</td>
                                            <td>{{$usuario->ap}}</td>
                                            <td>{{$usuario->am}}</td>
                                            <td>{{$usuario->correo}}</td>
                                            <td>{{$usuario->rol}}</td>
                                            <td>
                                                <form method="post"
                                                      action="{{url('/usuarios/'.$usuario->id_usuario)}}">
                                                    <!-- Actualizar -->
                                                    {{csrf_field()}}
                                                    <button type="button" rel="tooltip"
                                                            class="btn btn-success rounded-circle ">
                                                        <a class="text-light"
                                                           href="{{url('/usuarios/'.$usuario->id_usuario.'/edit')}}"><i
                                                                class="material-icons ">edit</i></a>
                                                    </button>


                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <!-- BORRAR -->
                                                    <button type="submit" rel="tooltip"
                                                            class="btn btn-danger rounded-circle ">
                                                        <i class="material-icons"
                                                           onclick="return confirm('¿Está seguro que desea eliminar?');">restore_from_trash</i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <span>
                                {{ $usuarios->links('pagination::bootstrap-4') }}
                                </span>
                                    <style>
                                        .w-5 {
                                            display: none;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
