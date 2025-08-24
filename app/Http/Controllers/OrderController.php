<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class OrderController extends Controller
{
    public function indexOrder()
    {
        $orders = Order::all();
        return view('staff.indexOrder', compact('orders'));
    }

    public function createOrder()
    {
        return view('staff.createOrder');
    }

    public function storeOrder(StoreOrderRequest $request)
    {
        $order = Order::create([
            'user_id' => $request->get('user_id'),
            'status' => $request->get('status'),
            'total_price' => 0,
        ]);

        return redirect()->route('staff.indexOrder')
            ->with('message', 'Create new order successfully');
    }

    public function editOrder($id)
    {
        $order = Order::findOrFail($id);

        return view('staff.editOrder', compact('order'));
    }

    public function updateOrder($id, StoreOrderRequest $request)
    {
        $order = Order::findOrFail($id);

        $totalPrice = OrderDetail::where('order_id', $id)->sum(DB::raw('price * quantity'));

        $order->update([
            'user_id' => $request->get('user_id'),
            'status' => $request->get('status'),
            'total_price' => $totalPrice, //Sau này dùng hàm tự động tính
        ]);

        return redirect()->route('staff.indexOrder')->with('message', 'Update order succesfully');
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        
        $order->delete();

        return redirect()->route('staff.indexOrder')->with('message', 'Delete order succesfully');
    }
}
