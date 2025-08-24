@extends('layouts.app')

@section('title', 'Danh sách danh mục')

@section('content')
    <h2>📚 Danh sách danh mục</h2>
    <a href="{{ route('categories.create')}}" class="btn btn-primary mb-3">+ Thêm danh mục</a>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif  

    @if($categories ->isEmpty())
        <p>Không có danh mục nào.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}">Sửa</a>
                            <a href="{{ route('categories.delete', ['id' => $category->id]) }}">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    <a href="{{ route('categories.index') }}">✍️ Viết bài mới</a>
@endsection
