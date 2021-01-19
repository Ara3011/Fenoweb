@extends('Template.headerf')
@section('content')


    <div class="container-fluid" >
        @if(Session::has('Mensaje'))
            <div class="alert alert-secondary text-center alert-dismissible text-uppercase">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="glyphicon glyphicon-ok"></span><em> {!! session('Mensaje') !!}</em></div>
        @endif
        <div class="col-md-12" >

            <div class="" >
                <div class="bg-greencard">
                    <div class="card-header text-blanco" >
                        <h4 class="text-center text-blanco">Mis notas</h4>
                    </div>
                </div>
                <div class="">
                    <div class="float-left">
                        <form action="{{url('/notas/show/exportar')}}" enctype="multipart/form-data">
                            <button class="btn font-weight-bold" style="border: grey 1px solid;" type="submit">
                                <img src="/img/excell.png" width="30" height="30">
                                Exportar mis notas</button>
                        </form>
                    </div>
                    <br>
                    <div class="float-left">
                        <form action="{{url('/graficas/grafica9/exportar')}}" enctype="multipart/form-data">
                            <button class="btn font-weight-bold" style="border: grey 1px solid;" type="submit">
                                <img src="/img/excell.png" width="30" height="30">
                                Exportar notas generales</button>
                        </form>
                    </div>
                    <div>
                       <h3 class="text-center">Notas de:   {{ Auth::user()->name }}  {{ Auth::user()->ap }}  {{ Auth::user()->am }}</h3>
                    </div>

                    <div class="dataTables_wrapper dt-bootstrap4" style=" overflow:scroll;
                    height:480px;
                     width:1080px;">
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

                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">Acciones
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
                                            <td>
                                                    <form method="post"
                                                          action="{{url('/notas/'.$nota->id_nota)}}">
                                                        <!-- Actualizar -->
                                                        {{csrf_field()}}
                                                        <button type="button" rel="tooltip"
                                                                class="btn btn-success btn-limon text-blanco ">
                                                            <a class="text-light"
                                                               href="{{url('/notas/'.$nota->id_nota.'/edit')}}"><i
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
        </div>
    </div>
    <div class="text-center">
        <span >
            {{ $notas->links('pagination::bootstrap-4') }}
        </span>
    </div>
    <style>
        .w-5 {
            display: none;
        }
    </style>
    <br>
@endsection
@section("scripts")
    <script type="text/javascript">

    </script>
@endsection

