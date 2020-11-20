@extends('Template.menugraf')
@section('contenido')

    <div  style="padding-top: 10px">
        <div class="row justify-content-center">
            <div>
                <center>
                    <form class="form-group form mt-2"  >
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
                    <div class="card" style="left: 20px">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="container_chart" style="height: 600px; width: 1050px"></div>
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
                text: 'Especies monitoreadas por los observadores de manera anual'
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
                    color:'rgb( 36, 2, 253 )',
                }
            },
            series: [{
                name: "especies observadas",
                data:{{json_encode($valores)}},
            }],
        });
    </script>
@endsection

