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
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Número de especies monitoreadas por los observadores.'
            },

            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,

                    }
                }
            },
            series: [{
                name: 'Especies monitoreadas',
                colorByPoint: true,
                data: {!! $datos !!}
            }]
        });

    </script>
@endsection

