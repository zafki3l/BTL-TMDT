@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}"> 
</head>
<body>
    {{-- Phần chính của trang --}}
    @yield('content')
    <main>
        {{-- Phần hiển thị SÁCH MỚI (NEW BOOKS) --}}
        <section class="book-section new-books">
            <h2 class="section-name">NEW BOOKS</h2>
            <div class="book-grid">
                @foreach ($newBooks as $book)
                    <div class="book-item">
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->name }}">
                        <h3 class="book-name">{{ $book->name }}</h3>
                        <p class="book-author">{{ $book->author }}</p>
                        <p class="book-price">{{ number_format($book->price, 0, ',', '.') }}đ</p>
                        <a href="{{ route('books.bookDetail', ['id' => $book->id]) }}" class="btn-view-detail">View Details</a>
                        <button class="btn-add-to-cart">Add to Cart</button>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Phần hiển thị SÁCH BÁN CHẠY NHẤT (BEST SELLER) --}}
        <section class="book-section best-seller">
            <h2 class="section-name">BEST SELLER</h2>
            <div class="book-grid">
                @foreach ($bestSellerBooks as $book)
                    <div class="book-item">
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->name }}">
                        <h3 class="book-name">{{ $book->name }}</h3>
                        <p class="book-author">{{ $book->author }}</p>
                        <p class="book-price">{{ number_format($book->price, 0, ',', '.') }}đ</p>
                        <a href="{{ route('books.bookDetail', ['id' => $book->id]) }}" class="btn-view-detail">View Details</a>
                        <button class="btn-add-to-cart">Add to Cart</button>
                        </div>
                @endforeach
            </div>
        </section>

        {{-- Phần hiển thị SÁCH GIẢM GIÁ (ON SALES) --}}
        <section class="book-section on-sales">
            <h2 class="section-name">ON SALES</h2>
            <div class="book-grid">
                @foreach ($onSaleBooks as $book)
                    <div class="book-item">
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->name }}">
                        <h3 class="book-name">{{ $book->name }}</h3>
                        <p class="book-author">{{ $book->author }}</p>
                        @if ($book->discount_price && $book->discount_price > 0)
                            <p class="original-price"><del>{{ number_format($book->price, 0, ',', '.') }}đ</del></p>
                            <p class="sale-price">{{ number_format($book->discount_price, 0, ',', '.') }}đ</p>
                        @else
                            <p class="book-price">{{ number_format($book->price, 0, ',', '.') }}đ</p>
                        @endif
                        <a href="{{ route('books.bookDetail', ['id' => $book->id]) }}" class="btn-view-detail">View Details</a>
                        <button class="btn-add-to-cart">Add to Cart</button>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</body>
</html>
@endsection