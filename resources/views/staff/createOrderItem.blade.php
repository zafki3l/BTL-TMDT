@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Create new order item</h1>
    <form action="{{ route('staff.storeOrderItem')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Order_ID: </label>
            <input type="text" name="order_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Book_ID: </label>
            <input type="text" name="book_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity: </label>
            <input type="text" name="quantity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price: </label>
            <input type="text" name="price" class="form-control" required>
        </div>

        <button type="submit">Confirm</button>
        <a href="{{ route('staff.indexOrderDetails') }}">Cancel</a>
    </form>
@endsection