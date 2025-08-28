<section class="book-section">
<head>
    <link rel="stylesheet" href="css/homepage.css">
</head>
    <h2 class="section-name">{{ $title }}</h2>
    <div class="book-grid">
        @foreach ($books as $book)
            <div class="book-item">
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->name }}">
                <h3 class="book-name">{{ $book->name }}</h3>
                <p class="book-author">{{ $book->author }}</p>

                <p class="book-price">
                    {{ number_format($book->price, 0, ',', '.') }}đ
                </p>

                <a href="{{ route('books.bookDetail', ['id' => $book->id]) }}" class="btn-view-detail">
                    View Details
                </a>
                <a href="{{ route('carts.addCart', $book->id) }}" class="btn-add-to-cart">
                    Add to Cart
                </a>
            </div>
        @endforeach
    </div>
</section>
