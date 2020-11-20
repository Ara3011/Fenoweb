@extends('Template.menugraf')
@section('contenido')
    <div class="container container mt-4" style="padding-top: 0px;">
        <div class="row justify-content-center">
            <div class="card-body">
                <div>
                    <center>
                        <form class="form-group form mt-2"  >
                            <select name="buscar_observador" id="buscar_observador" >
                                <option value="" disabled selected>Seleccione un observador</option>
                                @foreach($observadores as $observador)
                                    <option>{{$observador->nombre}}</option>
                                @endforeach
                            </select>
                            <select name="buscar_anio" id="buscar_anio" >
                                <option value="" disabled selected>Seleccione un año</option>
                                @foreach($anios as $anio)
                                    <option >{{$anio->anio}}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="Buscar" id="btn">
                        </form>

                    </center>
                </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="container_chart" style="height: 580px; width: 1020px"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    <script type="text/javascript">
        Highcharts.chart('container_chart', {
            chart: {
                type: 'column'
            },

            title: {
                text: 'Registros de un colector "X" en un año'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: {!! json_encode($categorias)!!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'No de datos registrados'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.1,
                    borderWidth: 3,
                    color:"rgb( 83, 167, 113 )",
                }
            },
            series: [{
                name: "Observaciones",
                data:{{json_encode($valores)}},
            }],
        });
    </script>

@endsection

