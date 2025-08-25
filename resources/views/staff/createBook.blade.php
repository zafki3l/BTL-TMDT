@extends('layouts.backend')

@section('content')
    <h1 class="mb-4">Create new book</h1>
    <form action="{{ route('staff.storeBook') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Book name: </label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Author: </label>
            <input type="text" name="author" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Publisher: </label>
            <input type="text" name="publisher" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price: </label>
            <input type="text" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity: </label>
            <input type="text" name="quantity" class="form-control" required>
        </div>

        <button type="submit">Confirm</button>
        <a href="{{ route('staff.indexBook') }}">Cancel</a>
    </form>
@endsection