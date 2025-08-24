<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'staff')->prefix('staff')->name('staff.')->group(function () {
    //Route trang dashboard
    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');

    //CRUD BOOK
    Route::get('/indexBook', [BookController::class, 'indexBook'])->name('indexBook');
    Route::get('createBook', [BookController::class, 'createBook'])->name('createBook');
    Route::post('/', [BookController::class, 'storeBook'])->name('storeBook');
    Route::get('book/{id}', [BookController::class, 'editBook'])->name('editBook');
    Route::put('book/{id}', [BookController::class, 'updateBook'])->name('updateBook');
    Route::get('book/{id}/deleteBook', [BookController::class, 'deleteBook'])->name('deleteBook');

    //CRUD ORDER
    Route::get('/indexOrder', [OrderController::class, 'indexOrder'])->name('indexOrder');
    Route::get('createOrder', [OrderController::class, 'createOrder'])->name('createOrder');
    Route::post('/', [OrderController::class, 'storeOrder'])->name('storeOrder');
    Route::get('order/{id}', [OrderController::class, 'editOrder'])->name('editOrder');
    Route::put('/order/{id}', [OrderController::class, 'updateOrder'])->name('updateOrder');
    Route::get('/order/{id}/deleteOrder/', [OrderController::class, 'deleteOrder'])->name('deleteOrder');


    //CRUD ORDER_DETAILS
});
