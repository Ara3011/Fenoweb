@extends('Template.menugraf')
@section('contenido')
    <div class="container container mt-4" style="padding-top: 10px">
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div>
                    <center>
                        <form class="form-group form mt-2"  >
                            <select name="buscar_anio" id="buscar_anio">
                                <option  disabled selected>Seleccione un año</option>
                                @foreach($anos as $ano)
                                    <option>{{$ano->anio}}</option>
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
                                <div id="container_chart" style="height: 700px; width: 1050px"></div>
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
                type: 'xrange'
            },
            title: {
                text: 'Highcharts X-range'
            },
            tooltip: {
                formatter: function() {

                    return new Date(this.point.x).toLocaleDateString()+" - "+new Date(this.point.x2).toLocaleDateString()+"<br>Observaciones:"+this.point.partialFill+ '.';

                }
            },


            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    }
                }
            },
            accessibility: {
                point: {
                    descriptionFormatter: function (point) {
                        var ix = point.index + 1,
                            category = point.yCategory,
                            from = new Date(point.x),
                            to = new Date(point.x2);
                        return ix + '. ' + category + ', ' + from.toDateString() +
                            ' to ' + to.toDateString() + '.';
                    }
                }
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: ''
                },
                categories:  {!! json_encode($categorias) !!},
                reversed: true
            },
            series: {!! str_replace('"',"",json_encode($data)) !!}

        });
        {{--
        Highcharts.chart('container_chart', {

            chart: {
                type: 'columnrange',
                inverted: true,

            },

            accessibility: {
                description: 'Image'
            },

            title: {
                text: 'Calendario de primera y última observación de cada fase fenológica por especie.'
            },

            subtitle: {
                text: ''
            },

            xAxis: {
                categories: {!! json_encode($categorias) !!}
            },

            yAxis: {

                title: {
                    text: 'Meses'
                },
                type: "datetime",
            },

            tooltip: {
                animation:true,
                formatter:function(){
                    return this.point.name
                }
            },

            plotOptions: {
                columnrange: {
                    dataLabels: {
                        enabled: true,
                        inside:true,
                        formatter: function (){
                            return new Date(this.point.low).toLocaleDateString()+"-"+new Date(this.point.high).toLocaleDateString()+"<br>Observaciones:"+this.point.name;
                        }
                    }
                }
            },


            series: {!! str_replace('"',"",json_encode($data)) !!},

        });
        --}}
    </script>
@endsection

