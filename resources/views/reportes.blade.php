@extends('layouts.baseori')
@section('title','Reportes')

@section('content')
    <reportes userlogeado="{{auth()->user()}}"></reportes>
@endsection