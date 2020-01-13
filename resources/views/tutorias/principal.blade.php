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

@endsection