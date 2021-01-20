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
                                <option value="{{$observador->nombre}}" {{$observador->nombre==$buscar_observador?"selected":""}}>{{$observador->nombre}}</option>
                            @endforeach
                        </select>
                        <select name="buscar_anio" id="buscar_anio" >
                            <option value="" disabled selected>Seleccione un año</option>
                            @foreach($anios as $anio)
                                <option value="{{$anio->anio}}" {{$anio->anio==$buscar_anio?"selected":""}}>{{$anio->anio}}</option>
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
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Número de fases fenológicas monitoreadas por los observadores.'
            },

            plotOptions: {
                animation: {
                    duration: 3000
                },
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,

                    }
                }
            },
            series: [{
                name: 'Fases fenológicas monitoreadas',
                colorByPoint: true,
                data: {!! $datos !!}
            }]
        });


    </script>
@endsection

