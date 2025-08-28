<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderItem;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function indexOrderDetails($id)
    {
        $order = Order::with('orderDetails.book')->findOrFail($id);
        $orderDetail = $order->orderDetails;

        $totalPrice = $this->getTotalPrice($id);

        return view('staff.indexOrderDetails', compact('order', 'orderDetail', 'totalPrice'));
    }

    public function createOrderItem($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('staff.createOrderItem', compact('order'));
    }

    public function storeOrderItem(StoreOrderItem $request)
    {
        $orderDetail = OrderDetail::create([
            'order_id' => $request->get('order_id'),
            'book_id' => $request->get('book_id'),
            'quantity' => $request->get('quantity'),
            'price' => $request->get('price')
        ]);

        return redirect()->route('staff.indexOrderDetails', $request->get('order_id'))
            ->with('message', 'Create new order item successfully');
    }

    public function editOrderItem($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        
        return view('staff.editOrderItem', compact('orderDetail'));
    }

    public function updateOrderItem($id, StoreOrderItem $request)
    {
        $orderDetail = OrderDetail::findOrFail($id);

        $orderDetail->update([
            'order_id' => $request->get('order_id'),
            'book_id' => $request->get('book_id'),
            'quantity' => $request->get('quantity'),
            'price' => $request->get('price'),
        ]);

        return redirect()->route('staff.indexOrderDetails', $request->get('order_id'))
            ->with('message', 'Update order item succesfully');
    }

    public function deleteOrderItem($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        $orderId = $orderDetail->order_id;

        $orderDetail->delete();

        return redirect()->route('staff.indexOrderDetails', $orderId)
            ->with('message', 'Delete order item succesfully');
    }

    public function getTotalPrice($orderId)
    {
        $total = OrderDetail::where('order_id', $orderId)
            ->sum(\DB::raw('price * quantity'));

        return $total;
    }
}
