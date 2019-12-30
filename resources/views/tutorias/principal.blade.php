@extends('layouts.base')
@section('title','TUTORIAS')

@section('content')
    <!--ventana info personal alumno-->
    <div class="ventanaAlumno" id="windowAlumno">
        <div class="cerrarventanaAlumno">
            <a href="javascript:cerrar()"><img src="/images/cancel.png" width="11" height="11"></a> 
        </div>

        
        <p class="subtitulos">Información Personal</p>
        <hr class="barrasubtitulos">
        <div class="contenedorVentana">
        
        </div>

        <p class="subtitulos">Información Académica</p>
        <hr class="barrasubtitulos">
        <div class="contenedorVentana2">
        
        </div>

        <p class="subtitulos">Inacistencias</p>
        <hr class="barrasubtitulos">
        <div class="contenedorVentana">
        
        </div>

        <p class="subtitulos">Salud - Incidencias</p>
        <hr class="barrasubtitulos">
        <div class="contenedorVentana2">
        
        </div>

        <p class="subtitulos">Trabajo Social</p>
        <hr class="barrasubtitulos">
        <div class="contenedorVentana">
        
        </div>
    </div>

    <!--Seccion lateral-->
   <section class="contenedor-secciones">
       <!--card info personal-->
       <div class="contenedorCard">
            <p class="subtitulos">Información Personal</p>
            <div id="cardInfoP" class="micard" onclick="abrir()">
               <div>

               </div>
           </div>
       </div>
       
        <!--card calificaciones-->
        <div class="contenedorCard">
            <p class="subtitulos">Calificaciones</p>
            <div id="cardInfoP" class="micard">
               <div>

               </div>
           </div>
       </div>

        <!--card faltas por asignatura-->
        <div class="contenedorCard">
            <p class="subtitulos">Faltas por Asignatura</p>
            <div id="cardInfoP" class="micard">
               <div>

               </div>
           </div>
       </div>
   </section>

   <section class="contenedor-notify">
       <!--card info personal-->
       <div class="contenedorCard">
           <div>
                <p class="subtitulos-small">16-09-2019 a 20-09-2019</p>
                <p class="subtitulos-small">Semana 3</p>
           </div>
            <p class="subtitulos">Notificaciones de Inacistencias</p>
            <div id="cardInfoP" class="micardNotifications">
               <div>

               </div>
           </div>
       </div>
       
        <!--card calificaciones-->
        <div class="contenedorCardReprobados">
            <p class="subtitulos">Alumnos Reprobados</p>
            <div id="cardInfoP" class="micardNotifications">
               <div>

               </div>
           </div>
       </div>
   </section>


   <script>

        Drag.init (document.getElementById("windowAlumno"));

        function abrir(){
            document.getElementById("windowAlumno").style.display ="block";
            document.getElementById("cardInfoP").style.background = "rgb(211, 211, 211)";
        }

        function cerrar(){
            document.getElementById("windowAlumno").style.display = "none";
            document.getElementById("cardInfoP").style.background = "white";
        }

    </script>
@endsection