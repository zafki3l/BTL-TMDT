@extends('layouts.app')

@section('title', 'Danh sách bài viết')

@section('content')
    <h2>📚 Danh sách bài viết</h2>
    <a href="{{ route('posts.create')}}" class="btn btn-primary mb-3">+ Thêm bài viết mới</a>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if($posts->isEmpty())
        <p>Không có bài viết nào.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}">Sửa</a>
                            <a href="{{ route('posts.delete', ['id' => $post->id]) }}">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    <a href="{{ route('posts.index') }}">✍️ Viết bài mới</a>
@endsection
