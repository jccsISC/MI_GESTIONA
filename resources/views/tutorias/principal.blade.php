@extends('layouts.basetuto')
@section('title','TUTORIAS')

@section('content')
    <!--ventana info personal alumno
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
    </div>-->

    <!--Seccion lateral-->
   <section class="contenedor-secciones">
       <!--card info personal-->
       <card-info-personal></card-info-personal>

       <!--card Calificaciones-->
       <card-calificaciones></card-calificaciones>
      
       <!--card Faltas-->
       <card-faltas></card-faltas>
      
   </section>

   <section class="contenedor-notify">
       
       <!--card notificaciones de justificantes-->
       <card-notify-inacistencias></card-notify-inacistencias>
    
       
       <!--card notificaciones de reprobdos-->
       <card-notify-reprobados></card-notify-reprobados>
       
       
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