@extends('Template.menugraf')
@section('contenido')

    <div class="container container mt-4" style="padding-top: 10px">
        <div class="row justify-content-center">
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
                text: 'Observaciones por cada sitio'
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
                    color:'orange',
                }
            },
            series: [{
                name: "Observaciones",
                data:{{json_encode($valores)}},
            }],
        });
    </script>
@endsection


