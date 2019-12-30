<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/dom-drag.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


    <header>
        <div class="contenedor minavbar">
            <a href="principal"><img class="logoCecy" src="/images/logo.jpg" alt="logo"></a>
            <div class="divbuscador">
               <!-- <img src="/images/loupe.png" alt="icon" class="miicosearch">-->
                <input type="text" id="buscador" class="mibuscador" style="width:300px;" placeholder="Buscar por nombre o número de control">
            </div>

            <nav>
                <ul>
                    <li><a href="#">Reportes</a></li>
                    <li><a href="#">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>
   


    @yield('content')

     
    <footer>
       <p>
            GESTIONA <br>
            Contactanos: 123 4567890 <br>
            gestiona@gmail.com
            
        </p>

        <p>Breve descripción de lo que va a llevar el pie de página</p>
    </footer>

</body>
</html>