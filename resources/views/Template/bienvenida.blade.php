<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'RED NACIONAL DE FENOLOGÍA')</title>

    <link rel="stylesheet"
          href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons') }}"/>
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"/>
    <!-- MIS ESTILOS, HEADER -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <!--FUENTE DE LETRAS -->
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css2?family=Oswald&display=swap') }}"/>
    <!-- ESTILOS DE LA PLANTILLA-->
    <link rel="stylesheet" type="text/css"
          href="{{asset ('https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Plantilla/css/jquery.bxslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plantilla/css/font-awesome.min.css')}}">
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


                    @if (Route::has('login'))
                        @auth
                            <li class=""><a href="{{url('/notas/create')}}">Registro de notas</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Consulta de Notas <i class="fas fa-caret-down"> </i>
                                </a>

                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <a class="nav-linkk" href="{{url('/notas')}}">Notas Generales</a>
                                    <a class="nav-linkk  " href="{{url('/notas/mis_notas')}}">Mis Notas</a>

                                </div>
                            </li>
                            @if(Auth::user()->tipo_usuario == 1)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Catálogos <i class="fas fa-caret-down"> </i>
                                    </a>

                                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                        <a class="nav-linkk" href="{{url('/climas')}}">Climas</a>
                                        <a class="nav-linkk  " href="{{url('/escalas')}}">Escalas BBCH</a>
                                        <a class="nav-linkk " href="{{url('/especies')}}">Especies</a>
                                        <a class="nav-linkk " href="{{url('/familias')}}">Familias</a>
                                        <a class="nav-linkk " href="{{url('/fenofases')}}">Fenofases</a>
                                        <a class="nav-linkk " href="{{url('/generos')}}">Géneros</a>
                                        <a class="nav-linkk " href="{{url('/municipios')}}">Municipios</a>
                                        <a class="nav-linkk " href="{{url('/individuos')}}">Individuos</a>
                                        <a class="nav-linkk " href="{{url('/sitios')}}">Sitios</a>
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link text-naranja " href="{{url('/graficas')}}">Gráficas</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Consulta de usuario <i class="fas fa-caret-down"> </i>
                                </a>

                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">

                                    <a class="nav-linkk  " href="{{url('/usuarios/show')}}">Mi perfil <i class="fas fa-user-edit"></i></a>
                                    <a class="nav-linkk  " href="{{url('/insignias')}}">Mis insignias <i class="fas fa-star"></i></a>
                                    @if(Auth::user()->tipo_usuario == 1)
                                    <a class="nav-linkk  " href="{{url('/usuarios')}}">Usuarios <i
                                            class="fas fa-users-cog"> </i></a>
                                        @endif
                                </div>
                            </li>
                            <li class="nav-item dropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }} <i class="fas fa-sign-out-alt"> </i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        @else
                            <li class=""><a href="{{url('/Notas_visitante')}}">Notas</a></li>
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
    <br><br><br><br>

</header>
<section>
    <section id="testimonial" class="wow fadeInUp delay-05s">
        <div class="bg-verde">
            <div class="container section-padding ">

                <div class="row">
                    <div class="testimonial-item">
                        <ul class="bxslider">
                            <li>
                                <blockquote>
                                    <br><br><br>
                                    <h2>¡BIENVENIDOS!</h2>
                                    <p>Consolidación del monitoreo fenológico comunitario. <br>
                                        Hemos conformado la primera red de observación fenológica, <br>
                                        única en su tipo en México y esperamos continuar extendiendo <br>
                                        este esfuerzo para llegar a más comunidades de México </p>
                                </blockquote>

                            </li>
                            <li>
                                <blockquote>
                                    <h2>¡MISIÓN!</h2>
                                    <p>Empoderar a las comunidades de México de capacidades <br>
                                        para monitorear, registrar y comprender,
                                        los cambios <br> en la vegetación de las especies de importancia
                                        local, para hacer frente <br> a los impactos del cambio climático a nivel local. </p>
                                </blockquote>

                            </li>
                            <li>
                                <blockquote>
                                    <h2>¡VISIÓN!</h2>
                                    <p>Comunidades Mexicanas capaces de formular sus posibles <br>
                                        estrategias locales de adaptación
                                        ante el cambio climático <br>
                                        a partir de la construcción de capacidades <br> de observación y registro fenológico </p>
                                </blockquote>
                            </li>
                           <!-- <li>
                                <blockquote>
                                    <img src="plantilla/img/thumb.png" class="img-responsive">
                                    <p>So here is us, on the raggedy edge. Don't push me, and I won't push you.</p>
                                </blockquote>
                                <small>John Doe, Client</small>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<section>

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


<!--Para carrousel-->
<script src="{{asset('Plantilla/js/wow.js')}}"></script>
<script src="{{asset('Plantilla/js/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('Plantilla/js/custom.js')}}"></script>

</html>
