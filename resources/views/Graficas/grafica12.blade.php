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
        /**
         * Highcharts X-range series plugin
         */
        (function (H) {
            var defaultPlotOptions = H.getOptions().plotOptions,
                columnType = H.seriesTypes.column,
                each = H.each,
                extendClass = H.extendClass,
                pick = H.pick,
                Point = H.Point,
                Series = H.Series;

            defaultPlotOptions.xrange = H.merge(defaultPlotOptions.column, {
                tooltip: {
                    pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.yCategory}</b><br/>'
                }
            });
            H.seriesTypes.xrange = H.extendClass(columnType, {
                pointClass: extendClass(Point, {
                    // Add x2 and yCategory to the available properties for tooltip formats
                    getLabelConfig: function () {
                        var cfg = Point.prototype.getLabelConfig.call(this);

                        cfg.x2 = this.x2;
                        cfg.yCategory = this.yCategory = this.series.yAxis.categories && this.series.yAxis.categories[this.y];
                        return cfg;
                    }
                }),
                type: 'xrange',
                forceDL: true,
                parallelArrays: ['x', 'x2', 'y'],
                requireSorting: false,
                animate: H.seriesTypes.line.prototype.animate,

                /**
                 * Borrow the column series metrics, but with swapped axes. This gives free access
                 * to features like groupPadding, grouping, pointWidth etc.
                 */
                getColumnMetrics: function () {
                    var metrics,
                        chart = this.chart;

                    function swapAxes() {
                        each(chart.series, function (s) {
                            var xAxis = s.xAxis;
                            s.xAxis = s.yAxis;
                            s.yAxis = xAxis;
                        });
                    }

                    swapAxes();

                    this.yAxis.closestPointRange = 1;
                    metrics = columnType.prototype.getColumnMetrics.call(this);

                    swapAxes();

                    return metrics;
                },

                /**
                 * Override cropData to show a point where x is outside visible range
                 * but x2 is outside.
                 */
                cropData: function (xData, yData, min, max) {

                    // Replace xData with x2Data to find the appropriate cropStart
                    var crop = Series.prototype.cropData.call(this, this.x2Data, yData, min, max);

                    // Re-insert the cropped xData
                    crop.xData = xData.slice(crop.start, crop.end);

                    return crop;
                },

                translate: function () {
                    columnType.prototype.translate.apply(this, arguments);
                    var series = this,
                        xAxis = series.xAxis,
                        metrics = series.columnMetrics,
                        minPointLength = series.options.minPointLength || 0;

                    H.each(series.points, function (point) {
                        var plotX = point.plotX,
                            plotX2 = xAxis.toPixels(H.pick(point.x2, point.x + (point.len || 0)), true),
                            width = plotX2 - plotX,
                            widthDifference;

                        if (minPointLength) {
                            widthDifference = width < minPointLength ? minPointLength - width : 0;
                            plotX -= widthDifference / 2;
                            plotX2 += widthDifference / 2;
                        }

                        plotX = Math.max(plotX, -10);
                        plotX2 = Math.min(Math.max(plotX2, -10), xAxis.len + 10);

                        point.shapeArgs = {
                            x: plotX,
                            y: point.plotY + metrics.offset,
                            width: plotX2 - plotX,
                            height: metrics.width
                        };
                        point.tooltipPos[0] += width / 2;
                        point.tooltipPos[1] -= metrics.width / 2;
                    });
                }
            });

            /**
             * Max x2 should be considered in xAxis extremes
             */
            H.wrap(H.Axis.prototype, 'getSeriesExtremes', function (proceed) {
                var axis = this,
                    dataMax,
                    modMax;

                proceed.call(this);
                if (this.isXAxis) {
                    dataMax = pick(axis.dataMax, Number.MIN_VALUE);
                    each(this.series, function (series) {
                        each(series.x2Data || [], function (val) {
                            if (val > dataMax) {
                                dataMax = val;
                                modMax = true;
                            }
                        });
                    });
                    if (modMax) {
                        axis.dataMax = dataMax;
                    }
                }
            });
        }(Highcharts));
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
            text: 'Primera y última fecha de cada fase fenológica de las especies.'
        },

        subtitle: {
            text: ''
        },

        xAxis: {
            categories: {!! json_encode($categorias) !!}
        },

        yAxis: {

            title: {
                text: 'Fechas'
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

