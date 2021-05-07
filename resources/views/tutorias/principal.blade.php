@extends('layouts.basetuto')
@section('title','TUTORIAS')

@section('content')

    <modal-generar-report userlogeado="{{auth()->user()}}" ></modal-generar-report>
    
  <section class="contenedor-notify">
        
          <!--card notificaciones de justificantes-->
          <card-notify-inacistencias></card-notify-inacistencias>

        
          <!--card notificaciones de reprobdos-->
          <card-notify-reprobados></card-notify-reprobados>
        
    </section>
    <!--Seccion lateral-->
   <section class="contenedor-secciones">
       <!--card info personal-->
       <card-info-personal></card-info-personal>

         <!--card info general-->
         <allinfo role="{{auth()->user()->roles->first()->name}}"></allinfo>

       <!--card Calificaciones-->
       <card-calificaciones></card-calificaciones>
      
       <!--card Faltas-->
       <card-faltas></card-faltas>
      
   </section>

   

   <form action="{{ route('alumnos.import.excel') }}" method="post" enctype="multipart/form-data" id="bottom-options">
      @csrf
      @if(Session::has('message'))
      <p>{{ Session::get('message') }}</p>
      @endif
      <input type="file" name="file">
      <button class="btn btn-secondary ml-5">Importar Alumnos</button>  
    </form>

@endsection