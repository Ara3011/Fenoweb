@extends('Template.menugraf')
@section('contenido')

    <div class="container container mt-4" style="padding-top: 10px">
        <div class="row justify-content-center">
            <figure class="highcharts-figure">
                <div id="container_chart" style="height: 650px; width: 1100px"></div>
            </figure>

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
                text: 'Observaciones por cada especie.'
            },
            subtitle: {
                text: ''
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'No. de registros'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                column: {
                    borderRadius:10
                },
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                    }
                }
            },

            series: [
                {
                    name: "Observaciones",
                    colorByPoint: true,
                    data:{!! $datos !!}
                }
            ],

        });
/*        Highcharts.chart('container_chart', {
            chart: {
                type: 'column'
            },

            title: {
                text: 'Observaciones para cada especie'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
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
                    color:'red',
                }
            },
            series: [{
                name: "Observaciones",
            }],
        });
        */
    </script>
@endsection

