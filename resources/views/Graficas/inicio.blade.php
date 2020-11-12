@extends('Template.headfoot')
@section('content')


    <body class="antialiased">
        <h1>hola</h1>

        <div id="list-example" class="list-group">
            <a class="list-group-item list-group-item-action"  href="{{url('graficas/grafica1')}}">Gráfica 1</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica2')}}">Gráfica 2</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica3')}}">Gráfica3</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica4')}}">Gráfica4</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica5')}}">Gráfica5</a>

          </div>
          <main class="container">
            @yield('content')
        </main>
    </body>
@endsection
