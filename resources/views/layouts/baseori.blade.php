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
                <a href="principal"><img class="logoCecy" src="/images/logo.jpg" alt="logo"></a>
                <mi-buscador></mi-buscador>

                <nav id="menu">
                    <ul>
                        <li><a href="#">Generales</a>
                            <ul>
                                <li><a href="#" type="button" data-toggle="modal" data-target="#verBecas">Becas</a></li>
                                <li><a href="#"type="button"  data-toggle="modal" data-target="#verDepencencias">Dependencias</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Reportes</a></li>
                        <li><a href="#">Cerrar Sesion</a></li>

                    </ul>
                </nav>
            </div>
        </header>
       
        <ver-becas></ver-becas>
        <ver-dependencias></ver-dependencias>
        @yield('content')

     
        <footer>
            <p>
                GESTIONA <br>
                Contactanos: 123 4567890 <br>
                gestiona@gmail.com
            </p>

            <p>Breve descripción de lo que va a llevar el pie de página</p>
        </footer>

    </div>
</body>

<style>
    .dropdown-menu > li > a:hover {
        color:white;
        background-color: rgb(167, 11, 11);
    }
    
</style>

</html>