<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('login', [AdminController::class, 'indexLogin'])->name('index_login');
Route::post('login', [AdminController::class, 'login'])->name('login');
Route::post('logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('home');
});
