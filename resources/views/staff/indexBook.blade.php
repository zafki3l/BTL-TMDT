@extends('layouts.app')

@section('content')
    <h2>📚 Book list</h2>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif  

    @if($books ->isEmpty())
        <p>The Book list is empty.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <a href="{{ route('staff.createBook') }}">Add new book</a>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->quantity }}</td>
                        <td>{{ $book->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
