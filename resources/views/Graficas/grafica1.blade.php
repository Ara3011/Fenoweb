@extends('Graficas.inicio')
@section('content')


        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <h1>hola</h1>
        <div id="container" style="width:100%; height:400px;"></div>
    </body>
    @endsection
    @section("scripts")
   <script> document.addEventListener('DOMContentLoaded', function () {
        Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Fruit Consumption'
            },
            xAxis: {
                categories: ['Apples', 'Bananas', 'Oranges']
            },
            yAxis: {
                title: {
                    text: 'Fruit eaten'
                }
            },
            series: [{
                name: 'Jane',
                data: [1, 0, 4]
            }, {
                name: 'John',
                data: [5, 7, 3]
            }],
        });
    });
</script>
@endsection
