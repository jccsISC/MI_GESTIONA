@extends('layouts.baseadmin')
@section('title','Administrador')

@section('content')
    <admin role="{{auth()->user()->roles->first()->name}}"></admin>
@endsection