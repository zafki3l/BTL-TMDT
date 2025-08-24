<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'staff')->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');
    //CRUD BOOK
    Route::get('/indexBook', [StaffController::class, 'indexBook'])->name('indexBook');
    Route::get('createBook', [StaffController::class, 'createBook'])->name('createBook');
    Route::post('/', [StaffController::class, 'storeBook'])->name('storeBook');
});
