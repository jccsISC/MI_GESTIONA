@extends('layouts.baseori')
@section('title','Reportes')

@section('content')
    <reportes role="{{auth()->user()->roles->first()->name}}"></reportes>
@endsection