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

Route::name('guest.')->group(function() {

    Route::post('login', [GuestController::class, 'login'])->name('login');

    Route::middleware(['auth'])->group(function() {
        Route::get('/', [GuestController::class, 'index'])->name('home');
        Route::prefix('news')->group(function() {
            Route::get('/', [GuestController::class, 'indexNews'])->name('news');
            Route::get('{slug}', [GuestController::class, 'detailNews'])->name('news.detail', ['slug' => 'slug']);
        });
    });

});


Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
