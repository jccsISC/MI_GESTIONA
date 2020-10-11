@extends('layouts.baseori')
@section('title','Inasistencias')

@section('content')
    <inasistencias  role="{{auth()->user()->roles->first()->name}}"></inasistencias>
@endsection