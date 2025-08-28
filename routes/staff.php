<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'staff')->prefix('staff')->name('staff.')->group(function () {
    //Route trang dashboard
    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');

    //CRUD BOOK
    Route::get('/indexBook', [BookController::class, 'indexBook'])->name('indexBook');
    Route::get('createBook', [BookController::class, 'createBook'])->name('createBook');
    Route::post('/indexBook', [BookController::class, 'storeBook'])->name('storeBook');
    Route::get('book/{id}', [BookController::class, 'editBook'])->name('editBook');
    Route::put('book/{id}', [BookController::class, 'updateBook'])->name('updateBook');
    Route::get('book/{id}/deleteBook', [BookController::class, 'deleteBook'])->name('deleteBook');

    //CRUD ORDER
    Route::get('/indexOrder', [OrderController::class, 'indexOrder'])->name('indexOrder');
    Route::get('createOrder', [OrderController::class, 'createOrder'])->name('createOrder');
    Route::post('/indexOrder', [OrderController::class, 'storeOrder'])->name('storeOrder');
    Route::get('order/{id}', [OrderController::class, 'editOrder'])->name('editOrder');
    Route::put('/order/{id}', [OrderController::class, 'updateOrder'])->name('updateOrder');
    Route::get('/order/{id}/deleteOrder/', [OrderController::class, 'deleteOrder'])->name('deleteOrder');

    //CRUD ORDER_DETAILS
    Route::get('/indexOrderDetails/{id}', [OrderDetailController::class, 'indexOrderDetails'])->name('indexOrderDetails');
    Route::get('/indexOrderDetails/{order_id}/createOrderItem', [OrderDetailController::class, 'createOrderItem'])->name('createOrderItem');
    Route::post('/indexOrderDetails/{order_id}', [OrderDetailController::class, 'storeOrderItem'])->name('storeOrderItem');
    Route::get('orderItem/{id}', [OrderDetailController::class, 'editOrderItem'])->name('editOrderItem');
    Route::put('/orderItem/{id}', [OrderDetailController::class, 'updateOrderItem'])->name('updateOrderItem');
    Route::get('/orderItem/{id}/deleteOrderItem/', [OrderDetailController::class, 'deleteOrderItem'])->name('deleteOrderItem');

    //Lập báo cáo doanh số hàng tháng
    Route::get('/monthlyReport', [SalesReportController::class, 'monthlyReport'])->name('monthlyReport');
});
