<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

use function Pest\Laravel\get;

class StaffController extends Controller
{
    public function dashboard()
    {
        return view('staff.dashboard');
    }

    public function indexBook()
    {
        $books = Book::all();
        return view('staff.indexBook', ['books' => $books]);
    }

    public function createBook()
    {
        return view('staff.createBook');
    }

    public function storeBook(StoreBookRequest $request)
    {
        $book = Book::create([
            'name' => $request->get('name'),
            'author' => $request->get('author'),
            'publisher' => $request->get('publisher'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'status' => $request->get('quantity') > 0
        ]);

        return redirect()->route('staff.indexBook')
            ->with('Message', 'Create new book successfully');
    }
}
