@extends('layouts.baseori')
@section('title','Administrador')

@section('content')
    <admin role="{{auth()->user()->roles->first()->name}}"></admin>

    <form action="{{ route('docente.import.excel') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if(Session::has('message'))
    <p>{{ Session::get('message') }}</p>
    @endif
    <input type="file" name="filedocente">
    <button>Importar Docentes</button>  
    </form>

@endsection