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
                type: 'columnrange',
                inverted: true,

            },

            accessibility: {
                description: 'Image'
            },

            title: {
                text: 'Calendario de primera y última observación de cada fase fenológica por especie (anuales).'
            },

            subtitle: {
                text: ''
            },

            xAxis: {
                categories: {!! $categorias !!},
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


            series:{!! str_replace('"',"",json_encode($data)) !!},

        });
    </script>
@endsection

