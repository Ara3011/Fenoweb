@extends('Template.headfoot')
@section('content')


    <body class="antialiased">

        <div id="list-example" class="list-group">
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica1')}}">Observaciones por cada observador (general).</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica2')}}">Observaciones por cada especie (general).</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica3')}}">Observaciones por cada sitio (general).</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica4')}}">Observaciones por cada fase fenológica (general).</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica5')}}">Calendario de primera y última observación de cada fase fenológica por especie (anuales).</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica6')}}">Mayores usos de las especies</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica7')}}">Registros de un observador "X" por años</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica8')}}">Sitios monitoreados de un observador "X" por años</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica9')}}">Coordenadas XY de todas las especies</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica10')}}">Especies monitoreadas por los observadores (anuales)</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica11')}}">Fenofases monitoreadas por observador "X" (anuales)</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica12')}}">Gráfica 12</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica13')}}">Gráfica 13</a>


          </div>
          <main class="container">
            @yield('content')
        </main>
    </body>
@endsection
