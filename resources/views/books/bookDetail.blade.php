{{-- resources/views/user/bookDetail.blade.php --}}

@extends('layouts.app') {{-- Kế thừa layout chung chứa header và footer của anh --}}

@section('name', $book->name . ' - Chi tiết sách') {{-- Đặt tiêu đề trang --}}

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css\bookDetail.css') }}">
</head>
<main class="book-detail-main">
    <div class="book-detail-container">
        {{-- Phần hiển thị ảnh bìa sách và các nút hành động --}}
        <div class="book-image-section">
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->name }}" class="book-cover-large">
            
            <div class="action-buttons">
                <div class="quantity-selector">
                    <button class="quantity-minus">-</button>
                    <input type="number" value="1" min="1" class="quantity-input">
                    <button class="quantity-plus">+</button>
                </div>
                <button class="btn-add-to-cart-detail">Thêm vào giỏ</button>
            </div>
        </div>

        {{-- Phần hiển thị thông tin chi tiết sách --}}
        <div class="book-info-section">
            <h1 class="book-name-detail">{{ $book->name }}</h1>
            <p class="book-author-detail">của {{ $book->author }}</p>
            
            <div class="book-meta-data">
                <p><strong>Nhà xuất bản:</strong> {{ $book->publisher }}</p>
                </p>
            </div>
            
            <p class="book-description">{{ $book->description }}</p>

            <div class="price-section">
                <p class="book-price-detail">{{ number_format($book->price, 0, ',', '.') }}đ</p>
            </div>
        </div>
    </div>
</main>
@endsection