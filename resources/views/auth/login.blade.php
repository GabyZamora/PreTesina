@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="contenedor-formulario contenedor">
    <div class="imagen-formulario">
        <img src="{{ asset('img/fondologin.jpg') }}" class="imagen-formulario"alt="">
    </div>
        <form method="POST" class="formulario" action="{{ route('login') }}">
            @csrf
            <div class="text-form">
                <h2>Bienvenido</h2>
                <p>Inicia sesión con tu cuenta</p>
            </div>

            <div class="input">
                <label for="email">{{ __('Correo electronico') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="input">
                <label for="password">{{ __('Contraseña') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="password-olvidada">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>
            <div class="input">
                <button type="submit" class="btn btn-primary">
                    {{ __('Iniciar sesion') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
