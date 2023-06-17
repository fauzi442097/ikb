<?php
use App\Http\Controllers\Guest\GuestController;
use Illuminate\Support\Facades\Route;

// Route Admin
Route::prefix('admin')->name('admin.')->group(__DIR__ . '/admin.php');

Auth::routes();

Route::name('guest.')->group(function() {

    Route::post('login', [GuestController::class, 'login'])->name('login');
    Route::get('logout', [GuestController::class, 'logout'])->name('logout');
    Route::post('register', [GuestController::class, 'register'])->name('register');

    Route::middleware(['auth'])->group(function() {
        Route::get('/', [GuestController::class, 'index'])->name('home');
        Route::get('/home', [GuestController::class, 'index']);
        Route::get('fill_data_member', [GuestController::class, 'indexFillDataMember'])->name('fill_data_member');
        Route::get('/profile', [GuestController::class, 'profile'])->name('profile');
        Route::get('account', [GuestController::class, 'account'])->name('account');
        Route::get('myProfile', [GuestController::class, 'myProfile'])->name('myProfile');

        Route::prefix('news')->group(function() {
            Route::get('/', [GuestController::class, 'indexNews'])->name('news');
            Route::get('{slug}', [GuestController::class, 'detailNews'])->name('news.detail', ['slug' => 'slug']);
        });
    });

});


Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
