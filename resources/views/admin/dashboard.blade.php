@extends('layouts.app')

@section('content')
    <h2>📚 User list</h2>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif  

    @if($users ->isEmpty())
        <p>The user list is empty.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('admin.edit', ['id' => $user->id]) }}">Sửa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
