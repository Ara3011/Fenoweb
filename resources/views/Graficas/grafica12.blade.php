@extends('Template.menugraf')
@section('contenido')
    <div class="container container mt-4" style="padding-top: 10px">
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div>
                    <center>
                        <form class="form-group form mt-2"  >
                            <select name="buscar_sitio" id="buscar_sitio">
                                <option  disabled selected>Seleccione un sitio</option>
                                @foreach($sitios as $sitio)
                                    <option>{{$sitio->sitio}}</option>
                                @endforeach
                            </select>
                            <select name="buscar_comunidad" id="buscar_comunidad">
                                <option  disabled selected>Seleccione una comunidad</option>
                                @foreach($comunidadades as $comunidad)
                                    <option>{{$comunidad->comunidad}}</option>
                                @endforeach
                            </select>
                            <select name="buscar_municipio" id="buscar_municipio">
                                <option  disabled selected>Seleccione un municipio</option>
                                @foreach($municipios as $municipio)
                                    <option>{{$municipio->municipio}}</option>
                                @endforeach
                            </select>
                            <select name="buscar_estado" id="buscar_estado">
                                <option  disabled selected>Seleccione un estado</option>
                                @foreach($estados as $estado)
                                    <option>{{$estado->estado}}</option>
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
    </script>
@endsection

