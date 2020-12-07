@extends('Template.menugraf')
@section('contenido')

    <div class="container container mt-4" style="padding-top: 0px;">
        <div class="row justify-content-center">
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
                type: 'funnel'
            },
            title: {
                text: 'Fenofases Monitoreadas por observador "X" anual'
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b> ({point.y:,.0f})',
                        softConnector: true
                    },
                    center: ['47%', '50%'],
                    neckWidth: '30%',
                    neckHeight: '25%',
                    width: '75%'
                }
            },
            legend: {
                enabled: false
            },
            series: [{
                name: 'Fenofases monitoreadas',
                data:{!! $datos !!}
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        plotOptions: {
                            series: {
                                dataLabels: {
                                    inside: true
                                },
                                center: ['50%', '50%'],
                                width: '100%'
                            }
                        }
                    }
                }]
            }
        });
    </script>
@endsection

