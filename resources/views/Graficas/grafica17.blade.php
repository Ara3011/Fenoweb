@extends('Template.menugraf')
@section('contenido')

    <div class="container container mt-4" style="padding-top: 10px;">
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div>
                    <center>
                        <form class="form-group form mt-2"  >
                            <select name="buscar_especie" id="buscar_especie">
                                <option  disabled selected>Seleccione una especie</option>
                                @foreach($especies as $especie)
                                    <option value="{{$especie->especie}}" {{$especie->especie==$buscar_especie?"selected":""}}>{{$especie->especie}}</option>
                                @endforeach
                            </select>
                            <select name="buscar_anio" id="buscar_anio" >
                                <option value="" disabled selected>Seleccione un año</option>
                                @foreach($anios as $ano)
                                    <option value="{{$ano->anio}}" {{$ano->anio==$buscar_anio?"selected":""}}>{{$ano->anio}}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="Buscar">
                        </form>
                    </center>
                </div>
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
                type: 'column'
            },
            title: {
                text: 'Menor duración de las fases fenológicas en las especies por año.'
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
                    text: 'No. de días transcurridos'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                animation: {
                    duration: 3000
                },
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
                    name: "Días transcurridos",
                    colorByPoint: true,
                    data:{!! $datos !!}
                }
            ],

        });


    </script>
@endsection

