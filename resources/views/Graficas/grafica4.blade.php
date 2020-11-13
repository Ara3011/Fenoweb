@extends('Template.headfoot')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8"><h3>
                    Gráficos
                </h3>
            </div>

            <figure class="highcharts-figure">
                <div id="container_chart" style="height: 600px; width: 1100px"></div>
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
                text: 'Monthly Average Rainfall'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
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
                    color:'orange',
                }
            },
            series: [{
                name: "Registros",
                data:{{json_encode($valores)}},
            }],
        });
    </script>
@endsection


