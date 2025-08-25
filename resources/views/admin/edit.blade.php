@extends('layouts.backend')

@section('content')
    <h2>Edit user's role</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.update', ['id' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="_method" value="put">
        <label for="name">Username:</label><br>
        <input type="text" name="name" value="{{ $user->name }}" disabled><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" value="{{ $user->email }}" disabled><br><br>

        <label for="role">Role:</label><br>
        <select name="role" required>
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
        </select><br><br>

        <button type="submit">Confirm</button>
    </form>

    <br>
    <a href="{{ route('admin.dashboard') }}">Cancel</a>
@endsection
