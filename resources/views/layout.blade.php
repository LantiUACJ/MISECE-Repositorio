<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MISECE</title>

    <!-- Material -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    @yield('head')

    <link rel="stylesheet" href="{{asset('styles.css')}}?v=1.0.0.2">
</head>
<body class="bg-dashboard">
    <div class="menu-mobile-toggle" onclick="toggleMenu()">
        <i class="material-icons">menu</i> <span>Menú</span>
    </div>
    <div class="menu-bg" id="menubg"></div>

    <div class="box">
        <div class="row fh nomargin">
            <div class="col m12 l3 fh nopad sidebar-wrapper" id="menusidebar">
                <div class="sidebar-container fh">
                    <div class="sidebar fh">
                        <div class="parent">
                            <div class="top">
                                <a href="{{url('/')}}">
                                    <div class="menu-logo">
                                        <img class="menu-logo" src="{{asset('logomisece.svg')}}" alt="">
                                    </div>
                                </a>
                                <div class="menu-items">
                                    
                                    <a class="vcenter {{ request()->is('inicio') ? "active" : null }}"  href="{{url('/inicio')}}">
                                        <i class="material-icons">home</i>Inicio
                                    </a>
                                    <a class="vcenter {{ request()->is('consultar') ? "active" : null }}"  href="{{url('/consultar')}}">
                                        <!--<i class="material-icons">home</i>-->Consultar datos
                                    </a>
                                    <a class="vcenter {{ request()->is('descargar') ? "active" : null }}"  href="{{url('/descargar')}}">
                                        <!--<i class="material-icons">home</i>-->Descargar
                                    </a>
                                    @auth                                    
                                        <a class="vcenter {{ (request()->is('administrar') ) ? 'active' : null }}" href="{{url('/administrar')}}">
                                            Administrar
                                        </a>
                                        <a class="vcenter" href="{{url('logout')}}">
                                            Cerrar sesión
                                        </a>
                                    @endauth
                                    @guest
                                        <a class="vcenter {{ (request()->is('login') ) ? 'active' : null }}" href="{{url('login')}}">
                                            Iniciar sesión
                                        </a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m12 l9 fh data-panel">
                <div class="data-container">
                    <div class="data-header">
                        <div class="box">
                            <div class="row">
                                <div class="col s9 m11">
                                    @auth
                                        <p class="header-text">¡Bienvenido, <b>{{auth()->user()->name}}!</b> </p>
                                    @endauth
                                    @guest
                                    <p class="header-text">¡Bienvenido al repositorio!</b> </p>
                                    @endguest
                                </div>
                                <div class="col s3 m1">
                                    <img class="profile-img" src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="opacity: 0.2;">

                    @yield("content")
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <div id="modal1" class="modal small-modal">
        <div class="modal-content">
            <div class="row">
                <h4>Guardado con éxito</h4>
                <p>Se ha guardado un nuevo registro de hospital.</p>
            </div>
        </div>
        <div class="modal-footer center">
            <a href="dashboard-admin-hospital.html" class="modal-close waves-effect waves-green btn">Cerrar</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sele = document.querySelectorAll('select');
            var instance = M.FormSelect.init(sele);
        });
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
        function toggleMenu() {
            var element = document.getElementById("menusidebar");
            element.classList.toggle("showmenu");
            var elementtwo = document.getElementById("menubg");
            elementtwo.classList.toggle("showbg");
        }
        $(document).ready(function(){
            $('.tooltipped').tooltip();
        });
        $(document).ready(function(){
            $('.collapsible').collapsible();
        });
    </script>

    @yield('scripts')
</body>
</html>