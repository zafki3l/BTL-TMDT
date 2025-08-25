@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Giỏ hàng của bạn</h2>

    @if ($cart && $cart->items_book && $cart->items_book->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Sách</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart->items_book as $item) <!-- sửa từ $cart->items -->
                <tr>
                    <td>{{ $item->book->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity * $item->price }}</td>
                    <td>
                        <form action="{{ route('carts.removeCart', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Giỏ hàng đang trống.</p>
@endif
</div>
@endsection
