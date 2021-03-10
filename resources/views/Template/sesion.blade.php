<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Red Nacional de Fenología</title>
    <!-- ESTILOS MIOS E ICONOS-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"/>
    <!--FUENTE DE LETRAS -->
    <link rel="stylesheet"
          href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons') }}"/>
    <link href="{{asset('https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css')}}"
          rel="stylesheet">
    <!-- ESTILOS DE HEADER-->
    <link rel="stylesheet" type="text/css"
          href="{{asset ('https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Plantilla/css/bootstrap.min.css')}}">
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
                    <li class="active"><a href="{{ url('/') }}" class="fin">Inicio</a></li>
                    <li class=""><a href="{{url('/Notas_visitante')}}">Notas</a></li>


                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}" class="fin">Iniciar Sesión <i
                                        class="fas fa-sign-in-alt"> </i></a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="fin">Registrarme <i
                                            class="fas fa-user-plus"> </i></a></li>
                            @endif
                        @endif

                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br><br><br>
</header>
<center>
    <section class=" justify-content-center h-100">


        @yield('content')


        <br>


    </section>
</center>

<footer class=" card card-footer">
    <h6 class="text-center footer">
        <strong>Copyright © 2021 Red Nacional de Fenología</strong>
        All rights reserved.
    </h6>
</footer>
</body>

<script src="{{asset('Plantilla/js/jquery.min.js')}}"></script>

<script src="{{asset('Plantilla/js/bootstrap.min.js')}}"></script>


</html>
