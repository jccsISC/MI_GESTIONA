@extends('layouts.baseori')
@section('title','Inasistencias')

@section('content')
    <inasistencias  userlogeado="{{auth()->user()}}"></inasistencias>
@endsection