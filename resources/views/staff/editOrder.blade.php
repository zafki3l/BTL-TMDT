@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit order</h1>
    <form action="{{ route('staff.updateOrder', ['id' => $order->id]) }}" method="post">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">User_ID: </label>
            <input type="text" name="user_id" class="form-control" value="{{ old('user_id', $order->user_id) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status: </label>
            <input type="text" name="status" class="form-control" value="{{ old('status', $order->status) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Total_Price: </label>
            <input type="text" name="total_price" class="form-control" value="{{ old('total_price', $order->total_price) }}" required>
        </div>

        <button type="submit">Confirm</button>
        <a href="{{ route('staff.indexOrder') }}">Cancel</a>
    </form>
@endsection