@extends('Template.headfoot')
@section('content')

    <div class="wrapper d-flex align-items-stretch">
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">

            <div class="nav flex-column nav-pills" style="width: 300px"  >
                <h2 class="card-header text-center text-black font-weight-bold">Información</h2>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica1')}}">Observaciones por cada
                    observador (general).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica2')}}">Observaciones por cada
                     especie (general).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica3')}}">Observaciones por cada
                     sitio (general).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica4')}}">Observaciones por cada
                     fase fenológica (general).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica5')}}">Calendario de primera
                   y última observación
                    de cada fase fenológica  por especie (anuales).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica6')}}">Mayores usos de las especies.</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica7')}}">Registros de un observador
                    <br> "X" (anuales).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica8')}}">Sitios monitoreados de
                    <br> un observador "X"  (anuales).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica9')}}">Base de Datos
                    <br>de todas las observaciones.</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica10')}}">Especies monitoreadas
                    <br>por los observadores (anuales).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica11')}}">Fenofases monitoreadas
                    <br> por observador "X" (anuales).</a>
               </div>

        </nav>

        <!-- Page Content  -->
        <main class="conteiner">
            @yield("contenido")
        </main>

    </div>

@endsection
