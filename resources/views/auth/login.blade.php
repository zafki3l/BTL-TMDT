@extends('layouts.backend')

@section('title', 'Login')

@section('content')
<div class="login-container">
<head>
    <link rel="stylesheet" href="css/login.css">
</head>
    <h2>LOGIN</h2>
    <form action="{{ route('postLogin') }}" method="post" novalidate>
        @csrf
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" placeholder="Email">

        <label for="password">Password *</label>
        <input type="password" id="password" name="password" placeholder="Password">

        <button type="submit">Login</button>
    </form>
    <p>
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('forgotPassword') }}">Forgot your password?</a>
    </p>

    <div class="register-with">
        <p>Or register with:</p>
        <a href="#">Google</a>
    </div>
</div>
@endsection
