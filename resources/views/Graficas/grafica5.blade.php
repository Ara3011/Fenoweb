@extends('Template.headfoot')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12"><h3>
                    Gráficos
                </h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="container_chart" style="height: 600px; width: 1100px"></div>
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
                text: 'Temperature variation by month'
            },

            subtitle: {
                text: 'Observed in Vik i Sogn, Norway, 2017'
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
                            return new Date(this.point.low).toLocaleDateString()+"-"+new Date(this.point.high).toLocaleDateString()+"<br>Descripciones:"+this.point.name;
                        }
                    }
                }
            },


            series: {!! str_replace('"',"",json_encode($data)) !!},

        });
    </script>
@endsection

