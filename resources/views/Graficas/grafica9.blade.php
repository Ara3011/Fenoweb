@extends('Template.headfoot')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success">

                    <h4 class="card-title">Fenofases</h4>
                </div>

                <div class="card-body">
                    <div>
                        <center>
                            <form class="form-group form mt-2"  >
                            <select name="buscar_sitio" id="buscar_sitio"  onchange="ShowSelected();">
                                <option value="" disabled selected>Seleccione un Sitio</option>
                                @foreach($sitios as $sitio)
                                <option>{{$sitio->sitio}}</option>
                                @endforeach
                            </select>
                                <select name="buscar_especie" id="buscar_especie"  onchange="ShowSelected2();">
                                    <option value="" disabled selected>Seleccione una especie</option>
                                    @foreach($especies as $especie)
                                        <option >{{$especie->especie}}</option>
                                    @endforeach
                                </select>
                                <input type="submit" value="Buscar">
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
                                            aria-label="Rendering engine: activate to sort column descending">Fecha
                                        </th>

                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Día Juliano
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Observador
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Nombre Común
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
                                            aria-label="Rendering engine: activate to sort column descending">Escala BBCH
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Id_individuo
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Sitio
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Id_sitio
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
                                            aria-label="Rendering engine: activate to sort column descending">Id_fenofase
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Fenofase
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Intensidad de la Fenofase
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Precipitación
                                        </th>

                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Temperatura minima
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Temperatura máxima
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Hallazgo
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach($datos as $dato)
                                        <tr role="row" class="odd">
                                            <td>{{$dato->fecha}}</td>
                                            <td>{{$dato->dia_juliano}}</td>
                                            <td>{{$dato->observador}}</td>
                                            <td>{{$dato->nombre_comun}}</td>
                                            <td>{{$dato->familia}}</td>
                                            <td>{{$dato->genero}}</td>
                                            <td>{{$dato->especie}}</td>
                                            <td>{{$dato->subespecies}}</td>
                                            <td>{{$dato->escala_bbch}}</td>
                                            <td>{{$dato->id_individuo}}</td>
                                            <td>{{$dato->sitio}}</td>
                                            <td>{{$dato->id_sitio}}</td>
                                            <td>{{$dato->comunidad}}</td>
                                            <td>{{$dato->municipio}}</td>
                                            <td>{{$dato->estado}}</td>
                                            <td>{{$dato->latitud}}</td>
                                            <td>{{$dato->longitud}}</td>
                                            <td>{{$dato->altitud}}</td>
                                            <td>{{$dato->id_fenofase}}</td>
                                            <td>{{$dato->fenofase}}</td>
                                            <td>{{$dato->int_feno}}</td>
                                            <td>{{$dato->precipitacion}}</td>
                                            <td>{{$dato->temperatura_minima}}</td>
                                            <td>{{$dato->temperatura_maxima}}</td>
                                            <td>{{$dato->nota}}</td>

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
@section("scripts")
    <script type="text/javascript">
        function ShowSelected()
        {
            /* Para obtener el texto */
            var combo = document.getElementById("buscar_sitio");
            var selected = combo.options[combo.selectedIndex].text;
            alert(selected);
        }
        function ShowSelected2()
        {
            /* Para obtener el texto */
            var combo = document.getElementById("buscar_especie");
            var selected = combo.options[combo.selectedIndex].text;
            alert(selected);
        }

    </script>
@endsection
