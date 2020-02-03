@extends('layouts.app')

@section('content')
    <div class="contenedor">
        <div class="contentHeader">
            <img class="imagenG" src="/images/gestiona.png" alt="logo">
        </div>            
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="container">
                <hr style="margin-top:70px;">
                <div class="divInputs">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Ingresa tu usuario" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingresa tu contraseña" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="registerbtn">
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
@endsection
