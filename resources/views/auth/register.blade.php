@extends('layouts.backend')

@section('content')
<div class="login-container">

    <head>
        <link rel="stylesheet" href="css/register.css">
    </head>

    <h2>REGISTER</h2>

    @if(session('message'))
    <div>
        {{ session('message') }}
    </div>
    @endif
    <form action="{{ route('postRegister') }}" method="POST" novalidate>
        @csrf

        <div>
            <label for="name">Username:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Username" required>
        </div>

        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
        </div>

        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" placeholder="Password" required>
        </div>

        <div>
            <label for="password_confirmation">Password confirmation:</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>

    <p>
        Already have an account?
        <a href="{{ route('login') }}">Login</a>
    </p>
</div>
@endsection
