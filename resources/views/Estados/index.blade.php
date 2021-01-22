@extends('Template.headerf')
@section('content')

    <div class="container-fluid">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="bg-greencard">
                    <h4 class="card-header text-blanco">Estados</h4>
                </div>

                <div class="card-bodyy">
                    <div>
                        <center>
                            <form class="form-group form mt-2">
                                <i class="fas fa-search" aria-hidden="true"></i>
                                <label for="buscar" class="text-dark"><h4>Filtro de búsqueda: </h4></label>
                                <input name="buscar" class="form-catalogo form-control-sm ml-3 w-75" type="text"
                                       placeholder="Buscar Estado"
                                       aria-label="buscar" value="{{$buscar}}">
                            </form>
                        </center>
                    </div>


                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <center>

                        </center>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table dataTable"
                                       role="grid" aria-describedby="example1_info">
                                    <thead class="thead-light">
                                    <tr role="row">
                                        <th class="sorting_asc text-center" tabindex="0" aria-controls="example1"
                                            rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Nombre
                                        </th>

                                    </thead>
                                    <tbody>
                                    @foreach($estados as $estado)
                                        <tr role="row" class="odd">
                                            <td class="text-center">{{$estado->nombre}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="text-center">
                                    <span>
                                {{ $estados->links('pagination::bootstrap-4') }}
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
    <div><br></div>
@endsection
