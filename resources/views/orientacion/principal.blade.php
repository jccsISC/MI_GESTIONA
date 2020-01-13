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

@endsection