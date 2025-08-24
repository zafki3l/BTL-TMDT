@extends('layouts.app')

@section('content')
    <h2>📚 Order details</h2>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Order_ID</th>
                <th>Book_ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total_Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <a href="{{ route('staff.createOrderItem') }}">Add new order item</a>
            @foreach($orderDetail as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->book_id }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->price * $order->quantity }}</td>
                    <td>
                        <a href="{{ route('staff.editOrderItem', ['id' => $order->id]) }}">Edit</a>
                        <a href="{{ route('staff.deleteOrderItem', ['id' => $order->id]) }}">Delete</a>
                    </td>
                    <tr>
                </tr>
            @endforeach
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Tổng cộng:</strong></td>
                    <td colspan="2"><strong>{{ number_format($totalPrice, 0, ',', '.') }} VND</strong></td>
                </tr>
        </tbody>
    </table>
    <a href="{{ route('staff.indexOrder') }}">Cancel</a>
@endsection
