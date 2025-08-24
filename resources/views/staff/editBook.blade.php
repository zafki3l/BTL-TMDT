    @extends('layouts.app')

    @section('content')
        <h1 class="mb-4">Edit book</h1>
        <form action="{{ route('staff.updateBook', ['id' => $book->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Book name: </label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $book->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Author: </label>
                <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Publisher: </label>
                <input type="text" name="publisher" class="form-control" value="{{ old('publisher', $book->publisher) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>
                    {{ old('description', $book->description) }}
                </textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Price: </label>
                <input type="text" name="price" class="form-control" value="{{ old('price', $book->price) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity: </label>
                <input type="text" name="quantity" class="form-control" value="{{ old('quantity', $book->quantity) }}" required>
            </div>

            <button type="submit">Confirm</button>
            <a href="{{ route('staff.indexBook') }}">Cancel</a>
        </form>
    @endsection