<!doctype html>
<html lang="es">
<head>
    <meta content="charset=UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}" />
    <link href = "{{asset('https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css')}}"
          rel = "stylesheet">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css')}}" rel="stylesheet" />
    <title>@yield('title','Inicio')</title>
</head>
<body>

<!--HEADER -->
<nav class="navbar navbar-expand-lg navbar-light bg-light card-header">
    <a class="navbar-brand" href="#">
        <img src="/img/logo.jpg" width="200" height="100" class="d-inline-block align-top" alt="">

        <a class="  navbar navbar-brand" href="{{url('/')}}"><span class="text-success font-weight-bold">RED NACIONAL DE</span>
            <span class="text-naranja font-weight-bold ">FENOLOGÍA</span></a>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link  text-naranja navbar-navhead " href="{{url('/')}}">Inicio</a>
            </li>
            <li class="nav-item"><a class="nav-link text-dark " href="{{url('/climas')}}">Climas</a>
            <li class="nav-item"><a class="nav-link text-dark " href="{{url('/escalas')}}">Escalas BBCH</a>
            </li>
            <li class="nav-item"><a class="nav-link text-dark " href="{{url('/especies')}}">Especies</a>
            </li>
            <li class="nav-item"><a class="nav-link text-dark " href="{{url('/estados')}}">Estados</a>
            </li>
            <li class="nav-item"><a class="nav-link text-dark " href="{{url('/familias')}}">Familias</a>
            </li>
            <li class="nav-item"><a class="nav-link text-dark " href="{{url('/fenofases')}}">Fenofases</a>
            </li>
            <li class="nav-item"><a class="nav-link text-dark " href="{{url('/generos')}}">Géneros</a>
            </li>
            <li class="nav-item"><a class="nav-link text-dark " href="{{url('/graficas')}}">Gráficas</a>
            </li>



        <!--<li class="nav-item"><a class="nav-link text-dark" href="{{url('/individuos')}}">Individuos</a>
            </li>
            <li class="nav-item"><a class="nav-link text-dark"
                                    href="{{url('/observadores')}}">Observadores</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{url('/sitios')}}">Sitios</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/notas2') }}">Notas</a></li>-->
        </ul>

    </div>

</nav>
<div class="text-center card-header" style="text-align: center">
<nav class="navbar-header" style="left: 1000px">
    <ul class="nav">
        <li class="nav-item"><a class="nav-link text-dark " href="{{url('/municipios')}}">Municipios</a>
        </li>
        <li class="nav-item"><a class="nav-link text-dark " href="{{url('/individuos')}}">Individuos</a>
        </li>
        <li class="nav-item"><a class="nav-link text-dark " href="{{url('/sitios')}}">Sitios</a>
        </li>
        <li class="nav-item"><a class="nav-link text-dark " href="{{url('/notas')}}">Notas</a>
        </li>
        <li class="nav-item"> <a class="nav-link text-dark "href="{{url('/notas/create')}}">Formulario</a>
        </li>


    </ul>
</nav>
</div>
<main class="container row align-items-start">
    @yield('content')
</main>


<!--FOOTER -->


<div class="container center" style="text-align: center">
<footer class="card-footer card">
    <strong>Copyright  © 2020 Red Nacional de Fenología</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block text-center">
    </div>
</footer>
</div>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
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
<!-- Termino de uso de librerías Highcharts-->
<script src = "{{asset('https://code.jquery.com/jquery-1.10.2.js')}}"></script>
<script src = "{{asset('https://code.jquery.com/ui/1.10.4/jquery-ui.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js')}}"></script>

@yield("scripts")
</body>
</html>
