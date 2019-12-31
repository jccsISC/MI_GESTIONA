@extends('layouts.app')
@section('title','Registrar Servicio Social')

@section('content')
    <form action="/servicio" method="POST" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Dependencia</label>
            <input type="text" name="IdDependencia" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Fecha de inicio</label>
            <input type="date" name="FechaInicio" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Fecha de finalización</label>
            <input type="date" name="FechaFin" class="form-control">
        </div>

        <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
@endsection