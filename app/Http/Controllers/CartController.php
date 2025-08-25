<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function indexCart()
{
    $cart = Cart::with('items_book.book')
                ->where('user_id', Auth::id())
                ->where('status', 'pending')
                ->first();

    // nếu chưa có cart thì tạo mới
    if (!$cart) {
        $cart = Cart::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
        ]);
    }

    return view('carts.indexCart', compact('cart'));
}


    public function addCart($bookId, Request $request)
    {
        $book = Book::findOrFail($bookId);
        
        //Tìm giỏ hàng pending
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
            'status' => 'pending'
        ]);

        //Thêm hoặc cập nhật item
        $item = CartItem::where('cart_id', $cart->id)
            ->where('book_id', $bookId)
            ->first();

        if ($item) {
            $item->quantity += 1;
            $item->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'book_id' => $bookId,
                'quantity' => 1,
                'price' => $book->price,
            ]);
        }

        return redirect()->route('carts.indexCart')
            ->with('message', 'Added item into carts successfully');
    }

    public function removeCart($itemId)
    {
        $item = CartItem::findOrFail($itemId);
        $item->delete();

        return redirect()->route('carts.indexCart');
    }
}
