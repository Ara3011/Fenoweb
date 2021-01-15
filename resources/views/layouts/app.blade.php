<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Red Nacional de Fenología') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">RED NACIONAL DE<span class="logo-dec"> FENOLOGÍA</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!--Menú links-->

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link  text-naranja navbar-navhead " href="{{url('/')}}">Inicio</a>
                        </li>
                        <li class="nav-item"><a class="nav-link  text-naranja navbar-navhead " href="{{url('/')}}">Mis insignias</a>
                        </li>
                        <li class="nav-item"><a class="nav-link  text-naranja navbar-navhead " href="{{url('/')}}">Formulario</a>
                        </li>
                        <li class="nav-item"><a class="nav-link  text-naranja navbar-navhead " href="{{url('/')}}">Notas</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Catalogos
                            </a>

                            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <a class="nav-link text-dark " href="{{url('/climas')}}">Climas</a>
                                <a class="nav-link text-dark " href="{{url('/escalas')}}">Escalas BBCH</a>
                                <a class="nav-link text-dark " href="{{url('/especies')}}">Especies</a>
                                <a class="nav-link text-dark " href="{{url('/familias')}}">Familias</a>
                                <a class="nav-link text-dark " href="{{url('/fenofases')}}">Fenofases</a>
                                <a class="nav-link text-dark " href="{{url('/generos')}}">Géneros</a>
                                <a class="nav-link text-dark " href="{{url('/municipios')}}">Municipios</a>
                                <a class="nav-link text-dark " href="{{url('/individuos')}}">Individuos</a>
                                <a class="nav-link text-dark " href="{{url('/sitios')}}">Sitios</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link text-naranja " href="{{url('/graficas')}}">Gráficas</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-naranja " href="{{url('/graficas')}}">Usuarios</a>
                        </li>
                    </ul>
                    <!-- Fin Menú links-->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))

                            @endif

                            @if (Route::has('register'))

                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

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

        <main class="container">
            @yield('content')
        </main>
    </div>
</body>
</html>
