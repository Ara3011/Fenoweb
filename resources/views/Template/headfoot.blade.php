<!doctype html>
<html lang="es">
<head>
    <meta content="charset=UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"/>
    <!--ICONOS BOTONES ACTUALIZAR Y ELIMINAR-->
    <link rel="stylesheet"
          href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons') }}"/>

    <link href="{{asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css')}}"
          rel="stylesheet"/>

    <!-- ESTILOS DE LA PLANTILLA-->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Plantilla/css/style.css')}}">




    <title>@yield('title','Inicio')</title>
</head>
<body>
<!--HEADER -->
<header>
<nav class="navbar navbar-expand-lg navbar-graficas ">
    <a class="navbar-brand" style="padding-left: 140px" href="#">Red Nacional de<span class="logo-dec">fenología</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="nav navbar-nav navbar-right"style="padding-left: 140px">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/notas/create')}}">Formulario<span class="sr-only">(current)</span></a>
            </li>


            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Notas
                </a>

                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <a class="nav-linkk"  href="{{url('/notas')}}">Notas Generales</a>
                    <a class="nav-linkk  " href="{{url('/notas/mis_notas')}}">Mis Notas</a>

                </div>
            </li>

            @if(Auth::user()->tipo_usuario == 1)
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Catalogos
                    </a>

                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="nav-linkk" href="{{url('/climas')}}">Climas</a>
                        <a class="nav-linkk  " href="{{url('/escalas')}}">Escalas BBCH</a>
                        <a class="nav-linkk " href="{{url('/especies')}}">Especies</a>
                        <a class="nav-linkk " href="{{url('/familias')}}">Familias</a>
                        <a class="nav-linkk " href="{{url('/fenofases')}}">Fenofases</a>
                        <a class="nav-linkk " href="{{url('/generos')}}">Géneros</a>
                        <a class="nav-linkk " href="{{url('/municipios')}}">Municipios</a>
                        <a class="nav-linkk " href="{{url('/sitios')}}">Sitios</a>
                        <a class="nav-linkk " href="{{url('/estados')}}">Estados</a>
                        <a class="nav-linkk " href="{{url('/individuos')}}">Individuos</a>

                    </div>
                </li>
                <li class="nav-item"><a class="nav-link text-naranja " href="{{url('/graficas')}}">Gráficas</a>
                </li>
            @endif
            @guest
                @if (Route::has('login'))

                @endif

                @if (Route::has('register'))

                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}  {{ Auth::user()->ap }}  <i class="fas fa-user"> </i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="nav-linkk" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesión') }} <i class="fas fa-sign-out-alt"> </i>
                        </a>
                        <a class="nav-linkk " href="{{url('/usuarios/show')}}">Mi perfil <i class="fas fa-user-edit"></i></a>
                        <a class="nav-linkk " href="{{url('/insignias')}}">Mis insignias <i class="fas fa-star"></i></a>
                        @if(Auth::user()->tipo_usuario == 1)
                            <a class="nav-linkk " href="{{url('/usuarios')}}">Usuarios <i class="fas fa-users-cog"> </i></a>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

        </ul>
    </div>
</nav>
</header>

<div class=" card-body">
    <div class="row">
        <div class="col-3">
            <div class="col-12">
            <div class="nav flex-column nav-pills"   >
                <h2 class="card-header text-center text-naranja font-weight-bold">Información</h2>
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
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica17')}}">17.- En que año duró menos la fase fenológica de las especies.</a>
                <a class="list-group-item list-group-item-action" href="{{url('graficas/grafica18')}}">18.- En que año duró más la fase fenológica de las especies.</a>
            </div>
            </div>

        </div>
        <div class="col-9  ">
            <div class="col-12">

                @yield('content')

            </div>


        </div>

    </div>


</div>

<main class="container row align-items-start">


</main>


<!--FOOTER -->


<div class="container center" style="text-align: center">
    <footer class="card-footer card">
        <strong>Copyright © 2020 Red Nacional de Fenología</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block text-center">
        </div>
    </footer>
</div>
<!-- jQuery --><script src="{{asset('Plantilla/js/jquery.min.js')}}"></script>
<script src="{{asset('Plantilla/js/bootstrap.min.js')}}"></script>

<script src="{{asset('https://code.jquery.com/ui/1.10.4/jquery-ui.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js')}}"></script>



<!-- Gráficas Highcharts -->
<script src="{{ mix('js/app.js') }}" defer></script>
<script src="{{ asset('js/highcharts.js') }}"></script>
<script src="{{ asset('js/exporting.js') }}"></script>
<script src="{{ asset('js/export-data.js') }}"></script>
<script src="{{ asset('js/accessibility.js') }}"></script>
<script src="{{ asset('js/highcharts-more.js') }}"></script>
<script src="{{ asset('js/funnel-module.js') }}"></script>
<script src="{{ asset('js/highcharts-3d.js') }}"></script>
<script src="{{ asset('js/cylinder.js') }}"></script>
<script src="{{ asset('js/pyramid3d.js') }}"></script>
<script src="{{ asset('js/heatmap.js') }}"></script>
<script src="{{ asset('js/x-range-series.js') }}"></script>
<script src="{{ asset('js/gantt.js') }}"></script>

<!-- Termino de uso de librerías Highcharts-->


@yield("scripts")
</body>
</html>
