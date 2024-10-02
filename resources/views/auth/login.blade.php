@extends('layouts.app')

@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Formulario con diseño personalizado -->
<div class="login-container">
    <form class="form" method="POST" action="{{ route('login') }}">
        @csrf
        <p id="heading">Login</p>

        <!-- Campo de Email -->
        <div class="field">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="..."></path> <!-- icon path code -->
            </svg>
            <input autocomplete="off" placeholder="Email" class="input-field" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- Campo de Contraseña -->
        <div class="field">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="..."></path> <!-- icon path code -->
            </svg>
            <input placeholder="Password" class="input-field" type="password" name="password" required>
        </div>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- Botones -->
        <div class="btn">
            <button class="button1" type="submit">Login</button>
            <a class="button2" href="{{ route('register') }}">Sign Up</a>
        </div>

        <!-- Forgot Password -->
        <a class="button3" href="{{ route('password.request') }}">Forgot Password</a>
    </form>
</div>


@endsection
