<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('login', [AdminController::class, 'login'])->name('login');
// Route::middleware(['auth.admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
// });
