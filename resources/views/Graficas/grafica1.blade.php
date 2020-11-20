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
                text: 'Observaciones por cada Observador'
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
                    text: 'No. de registros'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: "Observaciones",
                data:{{json_encode($valores)}},
            }],
        });
    </script>
@endsection

