@extends('layouts.base')
@section('title','Trabajo Social')

@section('content')

   <!--contenedores con información seccionada-->
   <section class="contenedor-secciones">
      <!--card info personal-->
      <card-info-personal></card-info-personal>

      <!--card info general-->
      <allinfo></allinfo>
      
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
       <card-notify-pases></card-notify-pases>
       
   </section>

@endsection