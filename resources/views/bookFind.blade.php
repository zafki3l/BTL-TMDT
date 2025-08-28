@extends('layouts.app')

@section('content')
    <h2>Kết quả tìm kiếm cho: {{ $bookName }}</em></h2>

    @if($books->isEmpty())
        <p>Không tìm thấy sách nào phù hợp.</p>
    @else
        <div class="book-grid">
            @foreach($books as $book)
                <div class="book-item">
                    <img src="{{ $book->image ?? 'https://via.placeholder.com/200x200' }}" alt="{{ $book->name }}">
                    <h3 class="book-title">{{ $book->name }}</h3>
                    <p class="book-author">{{ $book->author }}</p>
                    <p class="book-price">{{ number_format($book->price, 0, ',', '.') }} đ</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection
