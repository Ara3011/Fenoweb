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
                text: 'Observaciones por cada observador.'
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
                animation: {
                    duration: 3000
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


    </script>
@endsection

