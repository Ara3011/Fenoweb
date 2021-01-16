<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Red Nacional de Fenología</title>
    <!-- ESTILOS BOOTSTARP Y LETRAS-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet"
          href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons') }}"/>
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"/>
    <link href="{{asset('https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css')}}"
          rel="stylesheet">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css')}}"
          rel="stylesheet"/>
    <!--FUENTE DE LETRAS -->
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css2?family=Oswald&display=swap') }}"/>
    <!-- ESTILOS DE LA PLANTILLA-->
    <link rel="stylesheet" type="text/css"
          href="{{asset ('https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Plantilla/css/jquery.bxslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plantilla/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Plantilla/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Plantilla/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Plantilla/css/style.css')}}">
</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Red Nacional de<span class="logo-dec"> fenología</span></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{url('/')}}">Inicio</a></li>

                    <li class=""><a href="{{url('#')}}">Mis insignias</a></li>
                    <li class=""><a href="{{url('/notas/create')}}">Formulario</a></li>


                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Notas <i class="fas fa-caret-down"> </i>
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
                                Catalogos <i class="fas fa-caret-down"> </i>
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
                                {{ Auth::user()->name }} <i class="fas fa-user"> </i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="nav-linkk" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }} <i class="fas fa-sign-out-alt"> </i>
                                </a>
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
        </div>
    </nav>
    <br><br><br><br><br><br>
</header>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <br><br>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</section>

<footer class=" card card-footer">
    <h6 class="text-center footer">
        <strong>Copyright © 2020 Red Nacional de Fenología</strong>
        All rights reserved.
    </h6>
</footer>
</body>


<script src="{{asset('Plantilla/js/jquery.min.js')}}"></script>
<script src="{{asset('Plantilla/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('Plantilla/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Plantilla/js/wow.js')}}"></script>
<script src="{{asset('Plantilla/js/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('Plantilla/js/custom.js')}}"></script>
<script src="{{asset('Plantilla/contactform/contactform.js')}}"></script>

<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<!-- ChartJS -->
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
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

<script src="https://code.highcharts.com/modules/heatmap.js"></script>
<script src="https://code.highcharts.com/modules/xrange.js"></script>
<script src="https://code.highcharts.com/gantt/highcharts-gantt.js"></script>
<!-- Termino de uso de librerías Highcharts-->

<script src="{{asset('https://code.jquery.com/ui/1.10.4/jquery-ui.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js')}}"></script>


</html>
