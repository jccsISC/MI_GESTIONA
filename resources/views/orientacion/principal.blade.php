@extends('layouts.baseori')
@section('title','ORIENTACIÓN EDUCATIVA')

@section('content')
    
   
    
    <generar-report-oe></generar-report-oe>

    <!--Seccion lateral-->
   <section class="contenedor-secciones">
       <!--card info personal-->
       <card-info-personal></card-info-personal>

         <!--toda la info del alumno-->
        <allinfo></allinfo>

       <!--card Salud-->
       <card-salud></card-salud>
      
       <!--card Incidencias-->
       <card-incidencias></card-incidencias>
      
   </section>

   <section class="contenedor-notify">
       
        <card-notify-seguimiento></card-notify-seguimiento>
        
        <card-notify-talleres></card-notify-talleres>

       <!--card registro de talleres tomados-->
       <historial-talleres></historial-talleres>
       
   </section>
@endsection