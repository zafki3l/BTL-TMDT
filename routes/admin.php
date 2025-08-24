<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'admin')->prefix('admin')->name('admin.')->group(function (){
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard'); //admin.dashboard
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::put('/admin/edit/{id}', [AdminController::class, 'update'])->name('update');
});