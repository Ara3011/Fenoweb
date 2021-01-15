<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Red Nacional de Fenología</title>
    <!-- ESTILOS BOOTSTARP Y LETRAS-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" />
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
                    <li class="active"><a href="{{url('/notas')}}">Notas</a></li>


                    @if (Route::has('login'))
                        @auth
                            <li class=""><a href="{{url('#')}}">Mis insignias</a></li>
                            <li class=""><a href="{{url('/notas/create')}}">Formulario</a></li>
                            @if(Auth::user()->tipo_usuario == 1)
                            <li class=""><a href="{{url('#')}}">cat</a></li>
                            <li class=""><a href="{{url('/notas/create')}}">user</a></li>
                            <li class=""><a href="{{url('#')}}">Mis insignias</a></li>
                            <li class=""><a href="{{url('/notas/create')}}">admins</a></li>
                        @endif
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
                            <li><a href="{{ route('login') }}" class="fin">Iniciar Sesión</a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="fin">Registrame</a></li>
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
                                    <small>Shaun Paul, Client</small>
                                </li>
                                <li>
                                    <blockquote>
                                        <img src="plantilla/img/thumb.png" class="img-responsive">
                                        <p>So here is us, on the raggedy edge. Don't push me, and I won't push you. </p>
                                    </blockquote>
                                    <small>Marry Smith, Client</small>
                                </li>
                                <li>
                                    <blockquote>
                                        <img src="plantilla/img/thumb.png" class="img-responsive">
                                        <p>Come a day there won't be room for naughty men like us to slip about at all. This job goes south, there well may not be another.</p>
                                    </blockquote>
                                    <small>Vivek Singh, Client</small>
                                </li>
                                <li>
                                    <blockquote>
                                        <img src="plantilla/img/thumb.png" class="img-responsive">
                                        <p>So here is us, on the raggedy edge. Don't push me, and I won't push you.</p>
                                    </blockquote>
                                    <small>John Doe, Client</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
<section>

    <div class="bg-color">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="banner-info text-center wow fadeIn delay-05s">
                        <h2 class="bnr-sub-title">Starting a new journey!!</h2>
                        <p class="bnr-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.<br> Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip <br>ex ea commodo consequat.</p>

                        <div class="overlay-detail">
                            <a href="#feature"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class=" card card-footer">
    <h6 class="text-center footer">
        <strong>Copyright  © 2020 Red Nacional de Fenología</strong>
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
</html>
