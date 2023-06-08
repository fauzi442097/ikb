<?php
use App\Http\Controllers\Guest\GuestController;
use Illuminate\Support\Facades\Route;

// Route Admin
Route::prefix('admin')
    ->name('admin.')
    ->group(__DIR__ . '/admin.php');

// Route Guest
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', [GuestController::class, 'index']);

