@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Cập nhật danh mục</h1>
    <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="_method" value="put">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required value="{{ $category->name }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>
                {{ $category->description }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('categories.index') }}" class="btn btn secondary">Hủy</a>
    </form>
@endsection