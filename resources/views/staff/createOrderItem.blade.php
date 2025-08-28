@extends('layouts.backend')

@section('content')
<form action="{{ route('staff.storeOrderItem', $order->id) }}" method="post">
    @csrf
    <input type="hidden" name="order_id" value="{{ $order->id }}"> <!-- ẩn order_id -->
    
    <div class="mb-3">
        <label class="form-label">Book_ID: </label>
        <input type="text" name="book_id" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Quantity: </label>
        <input type="number" name="quantity" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Price: </label>
        <input type="number" name="price" class="form-control" required>
    </div>

    <button type="submit">Confirm</button>
    <a href="{{ route('staff.indexOrderDetails', $order->id) }}">Cancel</a>
</form>
@endsection
