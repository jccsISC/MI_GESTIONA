@extends('layouts.base')
@section('title','Trabajo Social')

@section('content')

   

   <!--ventana info personal alumno-->
   <!-- <div class="ventanaAlumno" id="windowAlumno">
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
   
   -->

  
   <!--contenedores con información seccionada-->
   <section class="contenedor-secciones">
      <!--card info personal-->
      <card-info-personal></card-info-personal>
      
      <!--card becas-->
      <card-becas></card-becas>
      
      <!--card praticas profesionales-->
      <card-practicas tipo="pp"></card-practicas>

       <!--card servicio social-->
       <card-practicas tipo="ss"></card-practicas>
       
       <!--card justificantes y pases-->
       <div class="contenedorCard">
            <p class="subtitulos">Justificantes y Pases de salida</p>
            <div id="cardInfoP" class="micardsm">
               <div>

               </div>
           </div>
       </div>
   </section>

   <section class="contenedor-notify">
       <!--card notificaciones de justificantes-->
       <card-notify-justificantes></card-notify-justificantes>
       
       <!--card notificaciones de reprobdos-->
       <card-notify-reprobados></card-notify-reprobados>
   </section>


   <!-- <script>

        Drag.init (document.getElementById("windowAlumno"));

        function abrir(){
            document.getElementById("windowAlumno").style.display ="block";
            document.getElementById("cardInfoP").style.background = "rgb(211, 211, 211)";
        }

        function cerrar(){
            document.getElementById("windowAlumno").style.display = "none";
            document.getElementById("cardInfoP").style.background = "white";
        }

    </script> -->
@endsection