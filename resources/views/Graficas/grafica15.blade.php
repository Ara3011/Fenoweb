@extends('Template.menugraf')
@section('contenido')

    <div class="container container mt-4" style="padding-top: 10px;">
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="container_chart" style="height: 650px; width: 1050px"></div>
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
                text: 'Observaciones por cada comunidad.'
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
                name: 'Observaciones',
                colorByPoint: true,
                data: {!! $datos !!}
            }]
        });
       /* Highcharts.chart('container_chart', {
            chart: {
                type: 'column'
            },

            title: {
                text: 'Mayores usos de las especies'
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
                    color:"rgb(135, 29, 146)",
                }
            },
            series: [{
                name: "Registros",
            }],
        });
        */
    </script>
@endsection

