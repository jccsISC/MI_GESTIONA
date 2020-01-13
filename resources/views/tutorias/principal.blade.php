@extends('layouts.basetuto')
@section('title','TUTORIAS')

@section('content')

    <modal-generar-report></modal-generar-report>

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