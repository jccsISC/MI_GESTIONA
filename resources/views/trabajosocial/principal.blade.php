@extends('layouts.base')
@section('title','Trabajo Social')

@section('content')

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
       <card-justificantes></card-justificantes>

   </section>

   <section class="contenedor-notify">
       
       <!--card notificaciones de justificantes-->
       <card-notify-justificantes></card-notify-justificantes>
       
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