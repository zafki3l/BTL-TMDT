<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    //Trang Index Book
    public function indexBook()
    {
        $books = Book::all();
        return view('staff.indexBook', ['books' => $books]);
    }

    //Hiển thị form create Book
    public function createBook()
    {
        return view('staff.createBook');
    }

    //Lưu book mới tạo vào Database
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

    //Hiển thị form edit Book
    public function editBook($id)
    {
        $book = Book::findOrFail($id);
        return view('staff.editBook', compact('book'));
    }

    //Cập nhật Book vào csdl
    public function updateBook($id, StoreBookRequest $request)
    {
        $book = Book::findOrFail($id);

        $book->update([
            'name' => $request->get('name'),
            'author' => $request->get('author'),
            'publisher' => $request->get('publisher'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'status' => $request->get('quantity') > 0
        ]);

        return redirect()->route('staff.indexBook')->with('message', 'Update book succesfully');
    }

    //Xóa sách
    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('staff.indexBook')->with('message', 'Delete book succesfully');
    }

    public function bookDetail($id)
    {
        $book = Book::findOrFail($id);

        return view('books.bookDetail', compact('book'));
    }
}
