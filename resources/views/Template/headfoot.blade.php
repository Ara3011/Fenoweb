<!doctype html>
<html lang="es">
<head>
    <meta content="charset=UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- ICONOS DE AGREGAR Y ELIMINAR -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- ESTILOS PERSONALES -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="https://code.highcharts.com/highcharts-more.js"></script>

@yield("scripts")
</body>
</html>
