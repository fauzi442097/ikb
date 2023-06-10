<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsCategoryController;
use Illuminate\Support\Facades\Route;


Route::get('login', [AdminController::class, 'indexLogin'])->name('index_login');
Route::post('login', [AdminController::class, 'login'])->name('login');
Route::post('logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('home');

    Route::prefix('news')->group(function() {
        Route::get('/', [NewsController::class, 'index'])->name('news');
        Route::get('create', [NewsController::class, 'create'])->name('news.create');
        Route::post('store', [NewsController::class, 'store'])->name('news.store');
        Route::get('show/{id}', [NewsController::class, 'show'])->name('news.show', ['id' => 'id']);
        Route::get('update/{id}', [NewsController::class, 'update'])->name('news.update', ['id' => 'id']);
    });

    Route::prefix('news-category')->group(function() {
        Route::get('/', [NewsCategoryController::class, 'index'])->name('news-category');
    });
});
