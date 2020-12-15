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
                type: 'bar'
            },
            title: {
                text: 'Duración de la fase fenológica por especies'
            },
            xAxis: {
                categories: ['Especie1', 'Especie2', 'Especie3', 'Especie4', 'Especie5']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Fechas'
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                bar: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'Fenofase1',
                data: [5, 3, 4, 7, 2]
            }, {
                name: 'Fenofase2',
                data: [2, 2, 3, 2, 1]
            }, {
                name: 'Fenofase3',
                data: [3, 4, 4, 2, 5]
            }]
        });
    </script>
@endsection

