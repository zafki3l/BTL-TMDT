<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderItem;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function indexOrderDetails()
    {
        $orderDetail = OrderDetail::all();
        $totalPrice = $this->getTotalPrice();

        return view('staff.indexOrderDetails', compact('orderDetail', 'totalPrice'));
    }

    public function createOrderItem()
    {
        return view('staff.createOrderItem');
    }

    public function storeOrderItem(StoreOrderItem $request)
    {
        $orderDetail = OrderDetail::create([
            'order_id' => $request->get('order_id'),
            'book_id' => $request->get('book_id'),
            'quantity' => $request->get('quantity'),
            'price' => $request->get('price')
        ]);

        return redirect()->route('staff.indexOrderDetails')
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

        return redirect()->route('staff.indexOrderDetails')
            ->with('message', 'Update order item succesfully');
    }

    public function deleteOrderItem($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);

        $orderDetail->delete();

        return redirect()->route('staff.indexOrderDetails')
            ->with('message', 'Delete order item succesfully');
    }

    public function getTotalPrice()
    {
        $total = OrderDetail::all()
            ->sum(function ($order) {
                return $order->price * $order->quantity;
            });

        return $total;
    }
}
