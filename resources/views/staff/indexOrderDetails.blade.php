@extends('layouts.backend')

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
            <a href="{{ route('staff.createOrderItem', $order->id) }}">Add new order item</a>
            @foreach($orderDetail as $detail)
                <tr>
                    <td>{{ $detail->order_id }}</td>
                    <td>{{ $detail->book_id }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->price }}</td>
                    <td>{{ $detail->price * $detail->quantity }}</td>
                    <td>
                        <a href="{{ route('staff.editOrderItem', ['id' => $detail->id]) }}">Edit</a>
                        <a href="{{ route('staff.deleteOrderItem', ['id' => $detail->id]) }}">Delete</a>
                    </td>
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
