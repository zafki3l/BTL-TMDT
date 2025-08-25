@extends('layouts.backend')

@section('content')
    <h1 class="mb-4">Create new order</h1>
    <form action="{{ route('staff.storeOrder') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">User id: </label>
            <input type="text" name="user_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status: </label>
            <input type="text" name="status" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Total Price: </label>
            <input type="text" name="total_price" class="form-control" required>
        </div>

        <button type="submit">Confirm</button>
        <a href="{{ route('staff.indexOrder') }}">Cancel</a>
    </form>
@endsection