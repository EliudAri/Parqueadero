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

<!-- Estilos personalizados -->
<style>
    body {
        min-height: 100vh;
        margin: 0;
        padding: 0;
        background-image: url('{{ asset('img/download.svg') }}');
        background-size: cover; /* o 'contain' dependiendo de tus necesidades */
        background-position: center;
        background-repeat: no-repeat;
        overflow: hidden; /* Evita el scroll */
    }

    /* Centra el formulario en la página */
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        /* background-color: #f0f0f0; */
      
    }

    /* Estilos personalizados del formulario */
    .form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 2em;
        background-color: #171717;
        border-radius: 25px;
        transition: 0.4s ease-in-out;
    }

    .form:hover {
        transform: scale(1.05);
        border: 1px solid black;
    }

    #heading {
        text-align: center;
        margin: 2em;
        color: #fff;
        font-size: 1.5em;
    }

    .field {
        display: flex;
        align-items: center;
        gap: 0.5em;
        border-radius: 25px;
        padding: 0.6em;
        background-color: #252525;
        box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
    }

    .input-icon {
        height: 1.5em;
        width: 1.5em;
        fill: white;
    }

    .input-field {
        background: none;
        border: none;
        outline: none;
        width: 100%;
        color: #d3d3d3;
        font-size: 1.1em;
    }

    .btn {
        display: flex;
        justify-content: center;
        gap: 1em;
        margin-top: 2.5em;
    }

    .button1, .button2 {
        padding: 0.6em 1.5em;
        border-radius: 5px;
        border: none;
        outline: none;
        background-color: #252525;
        color: white;
        transition: background-color 0.4s ease-in-out;
    }

    .button1:hover, .button2:hover {
        background-color: black;
        color: white;
    }

    .button3 {
        display: block;
        margin: 1.5em auto;
        padding: 0.5em;
        border-radius: 5px;
        background-color: #252525;
        color: white;
        text-align: center;
        transition: background-color 0.4s ease-in-out;
    }

    .button3:hover {
        background-color: red;
    }
</style>
@endsection
