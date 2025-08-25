@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Thay đổi mật khẩu</h1>

    @if(session('message'))
    <div>
        {{ session('message') }}
    </div>
    @endif
    <form action="{{ route('postForgotPassword') }}" method="POST" novalidate>
        @csrf
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Mật khẩu mới:</label><br>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Nhập lại mật khẩu mới:</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">Xác nhận</button>
    </form>

    <p>
        <a href="{{ route('login') }}">Hủy</a>
    </p>
</div>
@endsection
