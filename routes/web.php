<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PostController;

//Đường dẫn gốc
Route::get('/', [HomeController::class,'index'])->name('index');

Route::prefix('posts')->controller(PostController::class)
->name('posts.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');
});

Route::prefix('categories')->controller(CategoryController::class)
    ->name('categories.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::get('/{id}/delete', 'delete')->name('delete');
    });

//Đăng ký
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');

//Đăng nhập
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');

//Đăng xuất
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Đổi/Quên mật khẩu
Route::get('forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgotPassword', [AuthController::class, 'postForgotPassword'])->name('postForgotPassword');


Route::prefix('books')->controller(BookController::class)->name('books.')->group(function () {
    Route::get('bookDetail/{id}', [BookController::class, 'bookDetail'])->name('bookDetail');
});

Route::prefix('carts')->controller(CartController::class)->name('carts.')->group(function () {
    Route::get('/', [CartController::class, 'indexCart'])->name('indexCart');
    Route::get('/addCart/{bookId}', [CartController::class, 'addCart'])->name('addCart');
    Route::delete('/remove/{itemId}', [CartController::class, 'removeCart'])->name('removeCart');
});

//Tìm kiếm sách
Route::get('/find', [HomeController::class, 'findBook'])->name('findBook');
