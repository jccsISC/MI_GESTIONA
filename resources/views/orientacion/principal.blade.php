@extends('layouts.baseori')
@section('title','ORIENTACIÓN EDUCATIVA')

@section('content')
 
    <!--Seccion lateral-->
   <section class="contenedor-secciones">
       <!--card info personal-->
       <card-info-personal></card-info-personal>

       <!--card Salud-->
       <card-salud></card-salud>
      
       <!--card Incidencias-->
       <card-incidencias></card-incidencias>
      
   </section>

   <section class="contenedor-notify">
       
       <!--card notificaciones de seguimiento-->
       <card-notify-seguimiento></card-notify-seguimiento>
    
       <!--card notificaciones de talleres-->
       <card-notify-talleres></card-notify-talleres>

       <!--card notificaciones de historialTalleres-->
       <card-notify-hisTallerea></card-notify-hisTalleres>
       
       
       
   </section>


   <!--<script>

        Drag.init (document.getElementById("windowAlumno"));

        function abrir(){
            document.getElementById("windowAlumno").style.display ="block";
            document.getElementById("cardInfoP").style.background = "rgb(211, 211, 211)";
        }

        function cerrar(){
            document.getElementById("windowAlumno").style.display = "none";
            document.getElementById("cardInfoP").style.background = "white";
        }

    </script>-->
@endsection