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
            ->limit(8)->get();

        $bestSellerBooks = Book::inRandomOrder()
            ->limit(8)->get();
        
        $onSaleBooks = Book::inRandomOrder()
            ->limit(8)->get();
        
        return view('index', compact('newBooks', 'bestSellerBooks', 'onSaleBooks'));
    }
}
