@extends('Template.headerf')
@section('content')

    <div class="container-fluid">

        @if(Session::has('Mensaje'))
            <div class="alert bg-gris  text-center alert-dismissible text-uppercase">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="glyphicon glyphicon-ok"></span><em> {!! session('Mensaje') !!}</em></div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="bg-greencard">

                    <h4 class="card-header text-blanco text-center">Mi perfil: <br> <h1 class="text-center text-blanco">{{ Auth::user()->name }}  {{ Auth::user()->ap }}  {{ Auth::user()->am }}</h1></h4>
                </div>
                <div class="card-bodyy">

                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                                            aria-label="Rendering engine: activate to sort column descending">Apellido
                                            Paterno
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Apellido
                                            Materno
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Email
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Actualizar mis datos
                                        </th>

                                    </thead>
                                    <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr role="row" class="odd">
                                            <td>{{$usuario->nombre}}</td>
                                            <td>{{$usuario->ap}}</td>
                                            <td>{{$usuario->am}}</td>
                                            <td>{{$usuario->correo}}</td>
                                            <td>
                                                <form method="post"
                                                      action="{{url('/usuarios/'.$usuario->id_usuario)}}">
                                                    <!-- Actualizar -->
                                                    {{csrf_field()}}
                                                    <button type="button" rel="tooltip"
                                                            class="btn btn-success btn-limon text-blanco ">
                                                        <a class="text-light"
                                                           href="{{url('/usuarios/'.$usuario->id_usuario.'/edit')}}"><i
                                                                class="material-icons text-blanco ">edit</i></a>
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
    <br>
@endsection
