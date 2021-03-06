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

    <script src="https://unpkg.com/vue@2.6.10/dist/vue.min.js"></script>
    <script src="https://unpkg.com/vee-validate@latest"></script>

    <link rel="shorcut icon" href="images/iconG.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div id="app" class="contenedor-principal" >
        <header>
            <div class="contenedor minavbar">
                <a href="http://127.0.0.1:8000/T"><img class="logoCecy" src="/images/gestiona.png" alt="logo"></a>
               
                <mi-buscador></mi-buscador>

                <nav id="menu">
                    <ul>
                        <li><a href="/R">Reportes</a></li>
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
     
        @yield('content')

          
     
        <footer class="footer align-items-center container-fluid text-center" style="background-color: #800000; padding: 5rem 0;">
            <span style="color: white; font-weight: 400;">Copyright © CECYTEJ 07 2020 Todos los derechos reservados</span>
        </footer>

    </div>
</body>

<style>
    /*.dropdown-menu > li > a:hover {
        color:white;
        background-color: rgb(167, 11, 11);
    }
*/

    .midivbuscadorT{
        margin-left: 5%;
    }

    
    .cerrar a{
        color: white;
    }

/*
    .mibuscador{
        border-radius: 8px;
        border: 1px solid rgb(231, 231, 231);
        text-align: center;
        font-size: 12px;
        outline: none; eliminar el resplandor al foco del input
    }

    .mibuscador:focus{
        border-color: dodgerblue;
        box-shadow: 0 0 8px 0 dodgerblue;
    }
    /*El icono queda pendiente es temporal de esta forma
    .miicosearch{
        position: absolute;
        right: 40%;
        top:37%;
    }*/
    
</style>

</html>