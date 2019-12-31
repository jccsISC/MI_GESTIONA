@extends('layouts.app')

@section('content')
    <form action="/becas" method="POST" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nameBeca" class="form-control" placeholder="Ingrese el nombre de la beca">
        </div>

        <div class="form-group">
            <label for="">Tipo</label>
            <input type="text" name="tipoBeca" class="form-control" placeholder="Ingrese el tipo de la beca">
        </div>

        <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
@endsection