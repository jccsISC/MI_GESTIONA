@extends('layouts.baseadmin')
@section('title','Administrador')

@section('content')
    <admin role="{{auth()->user()->roles->first()->name}}"></admin>
    
    <form class="container" action="{{ route('docente.import.excel') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
        @endif

        <input type="file" name="filedocente">
        <button class="btn btn-secondary ml-5">Importar Docentes</button>  
    </form>
@endsection