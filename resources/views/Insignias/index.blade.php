@extends('Template.headerf')
@section('content')

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">

                <div class="bg-greencard">

                    <h4 class="card-header text-blanco text-center">Mis insignias:<h1
                            class="text-center text-blanco">{{ Auth::user()->name }}  {{ Auth::user()->ap }}  {{ Auth::user()->am }}</h1>
                    </h4>
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
                                            aria-label="Rendering engine: activate to sort column descending">
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">

                                        </th>
                                        <th class="sorting_asc text-center" tabindex="0" aria-controls="example1"
                                            rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Última
                                            Nota creada:
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                        </th>

                                    </thead>
                                    <tbody>
                                    @foreach($fecha as $fecha)
                                        <tr role="row" class="odd">
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">Fecha: {{$fecha->fecha}} <br>
                                                <span
                                                    class="text-naranja">(Cada 6 registros obtendrás una insignia)</span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-bodyy">

                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table dataTable"
                                       role="grid" aria-describedby="example1_info">

                                    <tbody>

                                    <tr>
                                        <td><img src="/img/rnf.jpg" alt="Red nacional de Fenología" width="400"
                                                 height="190"></td>
                                        <td><h3>Número total de insignias obtenidas</h3><br>
                                            @foreach($insignias as $insignia)
                                                <h2 class="text-center"><a><img src="/img/insignia.png"
                                                                                alt="Red nacional de Fenología"
                                                                                width="50"
                                                                                height="50"></a>{{$insignia->insignia}}
                                                </h2>
                                            @endforeach
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <h4 class="text-center">Gracias por registrar tus observaciones</h4><br>
                    <div class="text-center">Atentamente Red Nacional de Fenología</div>

                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
