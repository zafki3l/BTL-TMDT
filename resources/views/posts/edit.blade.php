@extends('layouts.app')

@section('content')
    <h1>Sửa bài viết</h1>
    <form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="_method" value="PUT">
        <div>
            <label for="">Tiêu đề</label>
            <input type="text" name="title" value="{{ $post->title }}">
        </div>

        <div>
            <label for="">Content</label>
            <textarea name="content" id="content" rows="4" required>{{ $post->content }}</textarea>
        </div>

        <button type="submit">Cập nhật</button>
        <a href="{{ route('posts.index') }}">Hủy</a>
    </form>
@endsection