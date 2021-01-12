<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--LIBRERIA DE ESTILOS UTILIZADOS  -->

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/Estilos.css') }}"/>

    <!--FUENTE DE LETRAS -->
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css2?family=Oswald&display=swap') }}"/>


    <title>Red Nacional de Fenología</title>
</head>
<!--CUERPO -->
<body>
<!--ESTRUCTURA DEL HEADER EL CUAL CONTIENE UN FONDO -->


<header class="fondo">
    <!--COLOR VERDE ENCIMADO DEL FONDO -->
    <div class="bg-color">
        <!--BARRA DEL HEADER EN COLOR BLANCO -->
        <div class=" navbar-default2">
            <!--MENU ACOMODADO -->
            <div class="menu">
                <a class="navbar-brand" href="#">
                    <img src="/img/logo.jpg" width="200" height="100" class="d-inline-block align-top" alt="">

                    <a class="  navbar navbar-brand" href="{{url('/')}}"><span class="text-success font-weight-bold">RED NACIONAL DE</span>
                        <span class="text-naranja font-weight-bold ">FENOLOGÍA</span></a>
                </a>
                <!-- INICIO DE LAS OPCIONES DE NAVEGACIÓN DEL HEADER -->
                <nav class="navbar-header">
                    <ul class="nav">
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
                    </ul>
                    <!--AQUI PEGAR CODIGO DE LOGIN-->
                </nav>
            </div>
            <nav class="navbar-header">
                <ul class="nav">
                    @if(Auth::user()->tipo_usuario == 1)
                        <li class="nav-item"><a class="nav-link text-dark " href="{{url('/municipios')}}">Municipios</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-dark " href="{{url('/individuos')}}">Individuos</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-dark " href="{{url('/sitios')}}">Sitios</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-dark " href="{{url('/notas')}}">Notas</a>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link text-dark "
                                                href="{{url('/notas/create')}}">Insignias</a>
                        </li>
                    @endif
                        <li class="nav-item"><a class="nav-link text-dark "
                                                href="{{url('/notas/create')}}">Formulario</a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                </ul>
            </nav>
        </div>
        <!-- CONTENIDO DEL CENTRO DEL CAROUSEL -->
        <div class="text-center cont-centro">
            <!-- INDICADORES DEL CAROUSEL -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <!-- CONTENIDO DE CADA PAGINA DE CAROUSEL (ACTIVA)  -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <h2>¡BIENVENIDOS!</h2>
                        <h1 class="mt-5  card-header">RED FENOLÓGICA MX</h1>
                        <h5 class="text-center mt-4 ">Consolidación del monitoreo fenológico comunitario. <br>
                            Hemos conformado la primera red de observación fenológica, <br>
                            única en su tipo en México y esperamos continuar extendiendo <br>
                            este esfuerzo para llegar a más comunidades de México.</h5>
                    </div>

                    <!--CONTENIDO CAROUSEL PAGINA 2 -->
                    <div class="carousel-item">

                        <h1 class="mt-5 card-header">MISIÓN</h1>
                        <h5 class="text-center ">Empoderar a las comunidades de México de capacidades <br>
                            para monitorear, registrar y comprender,
                            los cambios <br> en la vegetación de las especies de importancia
                            local, para hacer frente <br> a los impactos del cambio climático a nivel local.</h5>
                    </div>

                    <!-- CONTENIDO CAROUSEL PAGINA 3-->
                    <div class="carousel-item">

                        <h1 class="mt-5 card-header">VISIÓN</h1>
                        <h5 class="text-center mt-4 ">
                            Comunidades Mexicanas capaces de formular sus posibles <br>
                            estrategias locales de adaptación
                            ante el cambio climático <br>
                            a partir de la construcción de capacidades <br> de observación y registro fenológico
                        </h5>
                    </div>
                </div>
                <!--FLECHA DERECHA E IZQUIERDA DEL CAROUSEL -->
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</header>

<!--SECCION CREADA PARA TARJETAS DEL PORTAFOLIO -->
<section id="portfolio" class="bg-light card card-body">
    <div class="container">
        <div class="row">
            <!-- TITULO DE SECCION -->
            <div class="col-md-12 text-center">
                <h2 class="service-title pad-bt15 card-header text-naranja"> NUESTRA HISTORIA</h2>
                <p class="sub-title pad-bt15 ">

                    Los esfuerzos por comenzar a monitorear la vegetación de las comunidades Mexicanas se remontan al
                    año 2010, cuando Reforestamos México A. C. y la Universidad Nacional Autónoma de México comienzan a
                    sumar esfuerzos y crean el primer protocolo de observación y registro fenológico. Catemaco,
                    Veracruz; Calakmul, Campeche; Malinalco, Estado de México; Felipe Carrillo Puerto, en Quintana Roo y
                    Zitácuaro en el estado de Michoacán, fueron los municipios en los cuales se llevó a cabo el primer
                    proyecto piloto de monitoreo fenológico a partir del formato generado en el año 2010; sin embargo,
                    al ser una actividad voluntaria, únicamente Zitácuaro, Michoacán continuó con las observaciones
                    hasta el año 2013, año en el cual se presentan ante la comunidad de Valle Verde, del mismo
                    municipio, los primeros resultados preliminares del esfuerzo realizado durante poco más de dos años
                    y en dicha reunión asiste personal de Alternare, A. C. quien resulta interesado en aplicar el modelo
                    de observación es las comunidades con las que trabaja dentro de la Reserva de la Biosfera Mariposa
                    Monarca.

                    Es así que a partir de abril de 2013, se comienzan a realizar talleres de capacitación con las
                    comunidades interesadas y se realizan los primeros registros fenológicos en diferentes puntos de los
                    municipios de Zitácuaro, Áporo, Ocampo, Irimbo y en el Estado de México en el municipio de
                    Atlacomulco.

                    Nos hemos dado a la tarea de trabajar de la mano de las comunidades, a través de talleres de
                    capacitación, presentación de avances, para resolver dudas y con visitas de seguimiento a las
                    comunidades con el objetivo de supervisar el sitio de observación y ayudar al monitoreo de la
                    vegetación. Además invitando continuamente a más comunidades para sumarse a este esfuerzo, esperando
                    que durante el año 2017 puedan sumarse a esta red al menos 15 comunidades más.

                    Es de esta forma que hasta la fecha hemos conformado la primera red de observación fenológica, única
                    en su tipo en México y esperamos continuar extendiendo este esfuerzo para llegar a más comunidades
                    de México.
                </p>
                <hr class="bottom-line">
            </div>

            <!-- SEGUNDO TITULO DE SECCION -->
            <div class="col-md-12 text-center">
                <h2 class="service-title pad-bt15 mt-5 card-header text-success">EQUIPO</h2>
                <hr class="bottom-line">
            </div>
            <!-- TARJETA 1 -->
            <div class="col-md-4 col-sm-6 col-xs-12 padding-right-zero mr-btn-15">
                <figure>
                    <img src="img/doctora.png" class="img-responsive" width="250" height="250">
                    <figcaption>
                        <h2>Dra. Leticia Gómez Mendoza</h2>
                        <p>Líneas de investigación: cambio climático y biodiversidad, climatología y meteorología
                            sinóptica. Es profesora de tiempo completo en
                            licenciatura y posgrado del Colegio de Geografía de la Facultad de Filosofía y Letras de la
                            UNAM en las asignaturas de meteorología,
                            climatología y climatología urbana. Dirige el grupo de investigación Cambio climático y sus
                            implicaciones en la biodiversidad en
                            México de 2007 a la fecha. Obtuvo la licenciatura (1992), la maestría (2000) y doctorado en
                            Geografía (2007) por la UNAM. Su tesis doctoral
                            abordó el tema de: Variabilidad climática y cambio de uso de suelo en la Sierra Norte de
                            Oaxaca. Realizó un posdoctorado en el Centro de
                            Ciencias de la Atmósfera de la UNAM con un estudio sobre los efectos del cambio de uso de
                            suelo en los humedales costeros del Golfo de
                            México. Fue encargada del Observatorio Meteorológico Central de Tacubaya, del Servicio
                            Meteorológico Nacional y fue analista de la
                            Comisión para el Conocimiento y Uso de la Biodiversidad (Conabio). Ha participado en
                            proyectos sobre adaptación al cambio climático
                            en Tlaxcala, Áreas Naturales Protegidas, Sitios Turísticos y el ordenamiento territorial
                            bajo cambio climático en Tabasco.
                            Ha impartido cursos de especialización en métodos de observación meteorológica, climatología
                            y meteorología
                            en diversas instituciones. Obtuvo la medalla Alfonso Caso en dos ocasiones por la UNAM por
                            tesis de maestría y doctorado.</p>
                    </figcaption>
                </figure>
            </div>
            <!-- TARJETA 2 -->
            <div class="col-md-4 col-sm-6 col-xs-12  padding-right-zero mr-btn-15">
                <figure>
                    <img src="img/maestra.png" class="img-responsive" width="250" height="250">
                    <figcaption>
                        <h2>M. en Geog. Rocío Reyes González</h2>
                        <p>Licenciada y maestra en Geografía por la Universidad Nacional Autónoma de México; actualmente
                            estudiante del doctorado en Geografía
                            en la misma institución. Realizó una estancia de investigación en la USA-National Phenology
                            Network de la Universidad de Arizona.
                            Ha trabajado como consultora independiente en temas de restauración y evaluación del estado
                            de reforestaciones en diferentes regiones
                            del país, además de impartir clases a nivel preparatoria. Iniciadora del monitoreo
                            fenológico comunitario, ha impartido más
                            de diez talleres de capacitación a diversas comunidades de la Reserva de la Biosfera
                            Mariposa Monarca.</p>
                    </figcaption>
                </figure>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12  padding-right-zero mr-btn-15">
                <figure>
                    <img src="img/doctor.jpg" class="img-responsive" width="250" height="250">
                    <figcaption>
                        <h2>Dr. Abraham Navarro Moreno</h2>
                        <p>Es Doctor en Geografía por la Universidad Nacional Autónoma de México y profesor de carrera
                            de
                            tiempo completo en el Colegio de Geografía de la Facultad de Filosofía y Letras de la misma
                            universidad.
                            Tiene a su cargo las cátedras de Laboratorio de Manejo de Mapas, Cartografía 1, Laboratorio
                            de Sistemas de Información Geográfica, Cartografía Matemática 1, Cartografía Matemática 2 y
                            Seminario de Cartografía. Sus líneas de investigación y la dirección de tesis a su cargo,
                            reflexionan acerca de problemas cartográficos, tales como la aplicación de

                            proyecciones cartográficas, el diseño de mapas para temáticas especializadas y el uso de los
                            Sistemas de Información Geográfica.
                        </p>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section>

<section id="portfolio" class="bg-light card card-body">
    <div class="container">
        <div class="row">
            <!-- SEGUNDO TITULO DE SECCION -->
            <div class="col-md-12 text-center">
                <h2 class="service-title pad-bt15 mt-5 card-header text-naranja">GALERÍA</h2>
                <hr class="bottom-line">
            </div>

            <!-- TARJETA 2 -->
            <div class=" col-12 ">

                <center>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 " src="img/11.jpg" width="50" height="600" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/22.jpg" width="50" height="600" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/33.jpg" width="50" height="600" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/44.png" width="50" height="600" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </center>

            </div>
        </div>
    </div>
</section>


<div class=" card card-body text-center">

    <h2 class=" card card-header"><span>¿QUIÉNES SOMOS?</span></h2>

    <div class="parallax-content">
    </div>


    <div class="service-listing clearfix">

        <div class="clearfix service-list odd wow fadeInLeft animated" data-wow-delay="0.25s"
             style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInLeft;">
            <div class="service-image">
                <img src="https://redfenologicamx.com/wp-content/uploads/2018/01/EQUIPO-150x150.jpg"
                     alt="¿Quiénes somos?">
            </div>

            <div class="service-detail">
                <h3>¿Quiénes somos?</h3>
                <div class="service-content">
                    <div class="service-content">
                        <p>Somos un grupo de alumnos, profesores, investigadores e instituciones de la sociedad civil,
                            preocupados por rescatar el conocimiento tradicional fenológico que poseen las comunidades
                            mexicanas y darle aplicaciones prácticas para que sean capaces de implementar sus propias
                            estrategias de adaptación ante el cambio climático.&nbsp; Debido a nuestra preocupación por
                            conocer la respuesta de la vegetación ante las variaciones en el sistema climático y qué qué
                            efectos tendrán&nbsp; en las comunidades mexicanas, nos hemos dado a la tarea de crear la
                            Red Nacional de Fenología, la primera en su tipo en nuestro país, esperando contribuir al
                            conocimiento científico a través de la ciencia ciudadana creando ciencia por y para las
                            comunidades de México.</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="clearfix service-list even wow fadeInRight animated" data-wow-delay="0.5s"
             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
            <div class="service-image">
                <img src="https://redfenologicamx.com/wp-content/uploads/2018/01/MUNDO-150x150.jpg" alt="Misión">
            </div>

            <div class="service-detail">
                <h3>Misión</h3>
                <div class="service-content">
                    <div class="service-content">
                        <p>Empoderar a las comunidades de México de capacidades para monitorear, registrar y comprender,
                            los cambios en la vegetación de las especies de importancia local, para hacer frente a los
                            impactos del cambio climático a nivel local.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>


        <div class="clearfix service-list odd wow fadeInLeft animated" data-wow-delay="0.75s"
             style="visibility: visible; animation-delay: 0.75s; animation-name: fadeInLeft;">
            <div class="service-image">
                <img src="https://redfenologicamx.com/wp-content/uploads/2018/01/LUPA-150x150.jpg" alt="Visión">
            </div>

            <div class="service-detail">
                <h3>Visión</h3>
                <div class="service-content"><h3></h3>
                    <div class="service-content">
                        <p>Comunidades Mexicanas capaces de formular sus posibles estrategias locales de adaptación ante
                            el cambio climático a partir de la construcción de capacidades de observación y registro
                            fenológico</p>
                        <p>Nuestros objetivos</p>
                        <ul>
                            <li>Implementar y consolidar de la red de monitoreo fenológico comunitario en la Reserva de
                                la Biósfera Mariposa Monarca como sitio piloto de referencia de la iniciativa Red
                                Nacional de Fenología mediante la generación de plataformas de bases de datos
                                fenológicos y climáticos, talleres colaborativos y análisis de resultados en los
                                desarrollos productivos y de protección de bosques.
                            </li>
                            <li>Obtener los patrones de tendencias, variabilidad climática interanual y espacial de la
                                fenología local para especies de importancia comunitaria en cultivos y bosques con la
                                información previa y la generada durante este proyecto.
                            </li>
                            <li>Promover la Red Nacional de Fenología mediante el inicio de registros de monitoreo con
                                los interesados ya inscritos en la iniciativa en diciembre de 2015.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="clearfix service-list even wow fadeInRight animated" data-wow-delay="1s"
             style="visibility: visible; animation-delay: 1s; animation-name: fadeInRight;">
            <div class="service-image">
                <img src="https://redfenologicamx.com/wp-content/uploads/2018/01/COLABORADORES-1-150x150.jpg"
                     alt="Colaboradores">
            </div>

            <div class="service-detail">
                <h3>Colaboradores</h3>
                <div class="service-content"><h3><span style="font-size: 16px;">M. en C. Alyssa Rosemartin (USA-National Phenology Network, University of Arizona</span>
                    </h3>
                    <div class="service-content">
                        <p>M.&nbsp;en C. Esteban Solórzano Vega (Universidad Autónoma Chapingo)</p>
                        <p>Atzin Calvillo Arriola (Tierra Nueva)</p>
                        <p>Dr. José López García (Instituto de Geografía, UNAM)</p>
                        <p>Mtro. José Manuel Espinoza Rodriguez (Colegio de Geografía, FfyL, UNAM)</p>
                        <p>Dr. David Zermeño (Colegio de Geografía, FFyL, UNAM)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

    </div>
</div>
<div
    style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100;"
    id="jarallax-container-2">
    <div
        style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;https://redfenologicamx.com/&quot;); position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none;"></div>
</div>


<!--FOOTER DE LA PAGINA -->
<footer class="card-footer">
    <h6 class="text-center">
        © 2020 Red Nacional de Fenología
    </h6>
</footer>
<!--SCRIPTS QUE PERMITEN FUNCIONAMIENTO DE ESTILOS -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>


</body>
</html>
