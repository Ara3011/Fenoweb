@extends('Template.headfoot')
@section('content')


    <body class="antialiased">
        <h1>hola</h1>

        <div id="list-example" class="list-group">
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica1')}}">Gráfica 1</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica2')}}">Gráfica 2</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica3')}}">Gráfica 3</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica4')}}">Gráfica 4</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica5')}}">Gráfica 5</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica6')}}">Gráfica 6</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica7')}}">Gráfica 7</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica8')}}">Gráfica 8</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica9')}}">Gráfica 9</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica10')}}">Gráfica 10</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica11')}}">Gráfica 11</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica12')}}">Gráfica 12</a>
            <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica13')}}">Gráfica 13</a>


          </div>
          <main class="container">
            @yield('content')
        </main>
    </body>
@endsection
