@extends('Template.headfoot')
@section('content')

    <div class="wrapper d-flex align-items-stretch"   >
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">

            <div class="nav flex-column nav-pills" style="width: 300px;"  >
                <h2 class="card-header text-center text-orange font-weight-bold">Información</h2>
                <a class="list-group-item list-group-item-action "  href="{{url('graficas/grafica1')}}">1.- Observaciones por cada
                    observador (general).</a>
                <a class="list-group-item list-group-item-action"   href="{{url('graficas/grafica2')}}" >2.- Observaciones por cada
                     especie (general).</a>
                <a class="list-group-item list-group-item-action"  href="{{url('graficas/grafica3')}}">3.- Observaciones por cada
                    estado (general).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica4')}}">4.- Observaciones por cada
                    municipio (general).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica5')}}">5.- Observaciones por cada
                    sitio (general).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica6')}}">6.- Observaciones por cada
                    comunidad (general).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica7')}}">7.- Observaciones por cada
                    fase fenológica (general).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica8')}}">8.- Calendario de primera
                   y última observación
                    de cada fase fenológica  por especie (anuales).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica9')}}">9.- Mayores usos de las especies.</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica10')}}">10.- Registros de los observadores
                    <br> (anuales).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica11')}}">11.- Sitios monitoreados por
                    <br> los observadores (anuales).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica12')}}">12.- Base de Datos
                    <br>de todas las observaciones.</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica13')}}">13.- Especies monitoreadas
                    <br>por los observadores (anuales).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica14')}}">14.- Fases fenológicas monitoreadas
                    <br> por los observadores (anuales).</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica15')}}">15.- Inicio y fin de las fases fenológicas
                    <br> de las especies.</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica16')}}">16.- Calendario de duración de las fases fenológicas por especies.</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica17')}}">17.- En que año duró menos la fase fenológica de la especie.</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica18')}}">18.- En que año duró más la fase fenológica de la especie.</a>
               </div>
        </nav>


        <!-- Page Content  -->
        <main class="conteiner">
            @yield("contenido")
        </main>

    </div>

@endsection
