@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Tạo danh mục mới</h1>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('categories.index') }}" class="btn btn secondary">Hủy</a>
    </form>
@endsection