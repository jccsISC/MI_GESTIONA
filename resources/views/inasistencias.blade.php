@extends('layouts.baseori')
@section('title','Inasistencias')

@section('content')
    <inasistencias  userlogeado="{{auth()->user()}}"></inasistencias>

    <form class="container mb-2" action="{{ route('calificaciones.import.excel') }}" method="post" enctype="multipart/form-data" id="bottom-options">
      @csrf
      @if(Session::has('message'))
      <p>{{ Session::get('message') }}</p>
      @endif
      <input type="file" name="file">
      <button class="btn btn-secondary ml-5">Importar Calificaciones</button>  
    </form>

@endsection