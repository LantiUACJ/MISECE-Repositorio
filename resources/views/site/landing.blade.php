<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositorio - MISECE</title>

    <!-- Material -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('styles.css')}}?v=1.0.0.1">
</head>
<body class="landing-bg">
    <div class="container-big">
        <div class="mm-spacer"></div>
        <div class="mobile-menu" id="toggle">
            <div class="mm-logo">
                <img class="mm-img" src="{{asset('logomisece.svg')}}">
            </div>
            <div class="menu-icon" id="menuicon">
                <div class="menu-line"></div>
                <div class="menu-line"></div>
                <div class="menu-line"></div>
            </div>
        </div>
        <div class="row nomargin">
            <div class="col s12 m12 center">
                
                <div class="nav" id="menu">
                    <div class="nav-content">
                        <div class="nav-logo">
                            <img src="{{asset('logomisece.svg')}}">
                        </div>
                        <div class="nav-list">
                            <a class="link-menu" href="{{url('inicio')}}">Inicio</a>
                            <a class="link-menu" href="{{url('consultar')}}">Consultar</a>
                            <a class="link-menu" href="#about">Acerca de</a>
                            @auth
                                <a class="link-menu" href="{{url('logout')}}">Cerrar sesión </a>
                            @endauth
                            @guest
                                <a class="link-menu" href="{{url('login')}}">Iniciar sesión </a>
                            @endguest
                        </div>
                        <div class="nav-icons">
                            <img src="{{asset('concayt.png')}}" alt="">
                            <img src="{{asset('uacj.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="backshadow" id="drop">

                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col s12 m12 center">
                <div class="wrapper">

                    <div class="section-three" id="about">
                        <h4 class="section-title">Acerca del repositorio</h4>
                        <div class="title-element">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                        </div>
                        <p class="subtitle-two">
                            Repositorio de datos de salud extraídos de diversos sistemas de expediente clínico electrónico a través del MISECE. Plataforma desarrollada en la Universidad Autónoma de Ciudad Juárez, con fondos del Consejo Nacional de Ciencia y Tecnología
                        </p>
                        <!--
                        <div class="screenshot-container">
                            <img src="ss1.png" alt="">
                        </div> -->
                        <!-- <div class="tabs-section">
                            <ul id="tabs-swipe-demo" class="tabs">
                                <li class="tab col s3 tab-ele"><a class="active" href="#tab1">Elemento 1</a></li>
                                <li class="tab col s3 tab-ele"><a href="#tab2">Elemento 2</a></li>
                                <li class="tab col s3 tab-ele"><a href="#ttab3">Elemento 3</a></li>
                              </ul>
                              <div id="tab1" class="col s12 tcontent">Elemento 1</div>
                              <div id="tab2" class="col s12 tcontent">Elemento 2</div>
                              <div id="ttab3" class="col s12 tcontent">Elemento 3</div>
                        </div> -->
                    </div>


                    <div class="section-two parallax">
                        <h4 class="section-title text-white text-shadow">Una plataforma única para la salud</h4>
                        <!-- <div class="title-element">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                        </div> -->
                        <!-- <p class=" image-text-white">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, rerum aut! Modi odit consequatur ab sequi natus, laboriosam, fugiat debitis rem architecto error facilis ipsa, consequuntur ut porro maiores omnis.
                        </p> -->
                    </div>

                    <div class="section-five" id="contacto">
                        <h4 class="section-title">investigación con impacto social</h4>
                        <div class="title-element">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                        </div>
                        <p class="subtitle-two">
                            Plataforma tecnológica desarrollada por la Universidad Autónoma de Ciudad Juárez con financiamiento del Consejo Nacional de Ciencia y Tecnología, bajo el programa FORDECYT-PRONACES.
                        </p>
                        <div class="logos-brief">
                            <img src="{{asset('uacj.png')}}" alt="">
                            <img src="{{asset('concayt.png')}}" alt="">
                        </div>
                    </div>

                    <div class="section-four parallax">
                        <h4 class="section-title text-white text-shadow" style="margin-bottom: 10rem;">Impulsando la salud digital <br> en México</h4>
                        <!-- <div class="title-element">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                        </div> -->
                        <div class=" image-text-white">
                            <div class="row nomargin">
                                <div class="col s12 m4 footer-col">
                                    <p class="footer-title">MISECE </p>
                                    <div class="title-element small-element">
                                        <span class="line-one"></span>
                                        <span class="line-two"></span>
                                    </div>
                                    <!-- <p>contacto@misalud.com</p> -->
                                    <a href="{{env('MISECE_URL')}}">
                                        <div class="footer-logo">
                                            <img src="{{asset('logomisece.jpg')}}">
                                        </div>
                                    </a>
                                </div>
                                <div class="col s12 m4 footer-col">
                                    <p class="footer-title">Contacto</p>
                                    <div class="title-element small-element">
                                        <span class="line-one"></span>
                                        <span class="line-two"></span>
                                    </div>
                                    <p>victor.morales@uacj.mx</p>
                                    <!--<p>Ciudad de México</p>-->
                                </div>
                                <div class="col s12 m4 footer-col">
                                    <p class="footer-title">Acerca De </p>
                                    <div class="title-element small-element">
                                        <span class="line-one"></span>
                                        <span class="line-two"></span>
                                    </div>
                                    <p>Plataforma basada en modelo de interoperabilidad desarrollado por investigadores de la Universidad Autónoma de Ciudad Juárez con fondos del Consejo Nacional de Ciencia y Tecnología.</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="section-six">
                        <p>© Copyright 2022</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal small-modal">
        <div class="modal-content">
            <div class="row">
                <h4>Recuperar contraseña</h4>
                <p>Ingresa el correo electrónico para recuperar tu contraseña.</p>
                <div class="input">
                    <input class="no-pad" type="email" placeholder="Ingresa tu correo electrónico">
                </div>
            </div>
        </div>
        <div class="modal-footer center">
        <a href="#!" class="modal-close waves-effect waves-green btn">Enviar</a>
        </div>
    </div>
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
    </script>

    <script>
        $(document).ready(function(){
            $('ul.tabs').tabs({
            swipeable : true,
            responsiveThreshold : 1920
            });
        });
        $(document).ready(function(){
            $("#toggle").click(function(){
                $("#menu").toggleClass("opened-menu");
                $("#drop").toggleClass("opened-menu");
                $("#menuicon").toggleClass("activebtn");
                
            });
            $(".link-menu").click(function(){
                if ($(window).width() < 1140) {
                $("#menu").removeClass("opened-menu");
                $("#drop").removeClass("opened-menu");
                $("#menuicon").removeClass("activebtn");

                }
            })
            $("#drop").click(function(){
                $("#menu").removeClass("opened-menu");
                $("#drop").removeClass("opened-menu");
                $("#menuicon").removeClass("activebtn");

            })
        });
    </script>

</body>
</html>