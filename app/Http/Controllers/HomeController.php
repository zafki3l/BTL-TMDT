<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $newBooks = Book::orderBy('created_at', 'desc')
            ->limit(10)->get();

        $bestSellerBooks = Book::inRandomOrder()
            ->limit(10)->get();
        
        $onSaleBooks = Book::inRandomOrder()
            ->limit(10)->get();
        
        return view('index', compact('newBooks', 'bestSellerBooks', 'onSaleBooks'));
    }

    public function findBook(Request $request)
    {
        $bookName = $request->input('name');

        $books = Book::where('name', 'like', "%{$bookName}%")
                    ->orWhere('author', 'like', "%{$bookName}%")
                    ->get();

        return view('bookFind', compact('books', 'bookName'));
    }
}