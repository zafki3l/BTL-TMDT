@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit order item</h1>
    <form action="{{ route('staff.updateOrderItem', ['id' => $orderDetail->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Order_ID: </label>
            <input type="text" name="order_id" class="form-control" value="{{ old('order_id', $orderDetail->order_id) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Book_ID: </label>
            <input type="text" name="book_id" class="form-control" value="{{ old('book_id', $orderDetail->book_id) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity: </label>
            <input type="text" name="quantity" class="form-control" value="{{ old('quantity', $orderDetail->quantity) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price: </label>
            <input type="text" name="price" class="form-control" value="{{ old('price', $orderDetail->price) }}" required>
        </div>

        <button type="submit">Confirm</button>
        <a href="{{ route('staff.indexOrder') }}">Cancel</a>
    </form>
@endsection