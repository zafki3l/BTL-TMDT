@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Register</h1>

    @if(session('message'))
    <div>
        {{ session('message') }}
    </div>
    @endif
    <form action="{{ route('postRegister') }}" method="POST" novalidate>
        @csrf

        <div>
            <label for="name">Username:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Password confirmation:</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>

    <p>
        Đã có tài khoản?
        <a href="{{ route('login') }}">Login</a>
    </p>
</div>
@endsection
