<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/estilos.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="js/dom-drag.js"></script>
    <script src="https://kit.fontawesome.com/fe19f07cc0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div id="app" class="contenedor-principal" >
        <header>
            <div class="contenedor minavbar">
                <a href="#"><img class="logoCecy" src="/images/gestiona.png" alt="logo"></a>
                <mi-buscador></mi-buscador>

                <nav id="menu">
                    <ul>
                        <li><a href="#" type="button" data-toggle="modal" data-target="#verUsuarios">Usuarios</a></li>
                        <li><div class="cerrar" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <!-- {{ __('Logout') }} -->
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <ver-usuarios></ver-usuarios>
        @yield('content')

     
     
        <footer class="footer align-items-center container-fluid text-center" style="background-color: #800000; padding: 5rem 0;">
            <span style="color: white; font-weight: 400;">Copyright © CECYTEJ 07 2020 Todos los derechos reservados</span>
        </footer>
      
    </div>
</body>

<style>
    .dropdown-menu > li > a:hover {
        color:white;
        background-color: rgb(167, 11, 11);
    }
    
    .cerrar a{
        color: white;
    }

    

</style>

</html>