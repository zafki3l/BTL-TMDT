@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Tạo bài viết mới</h1>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('posts.index') }}" class="btn btn secondary">Hủy</a>
    </form>
@endsection