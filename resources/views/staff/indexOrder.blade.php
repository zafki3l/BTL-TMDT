@extends('layouts.app')

@section('content')
    <h2>📚 Order list</h2>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>user_ID</th>
                <th>Status</th>
                <th>Total_Price</th>
                <th>Created_At</th>
                <th>Updated_At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <a href="{{ route('staff.createOrder') }}">Add new order</a>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>
                        <a href="{{ route('staff.editOrder', ['id' => $order->id]) }}">Edit</a>
                        <a href="{{ route('staff.deleteOrder', ['id' => $order->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
