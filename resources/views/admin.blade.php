@extends('layouts.baseadmin')
@section('title','Adminiswhatrador')

@section('content')
    <admin role="{{auth()->user()->roles->first()->name}}"></admin>
@endsection