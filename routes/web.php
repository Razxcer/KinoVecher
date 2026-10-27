<?php
use App\Models\Movie;
use App\Http\Controllers\WatchLaterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Catalog', [
        'movies' => Movie::all()
    ]);
})->name('home');

use App\Http\Controllers\MovieController;

Route::get('/catalog', [MovieController::class, 'index'])->name('catalog');


// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');ы
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('profile', function () {
    return Inertia::render('Profile');
})->middleware('auth')->name('profile');


Route::middleware(['auth'])->group(function () {
    Route::get('/watch-later', [WatchLaterController::class, 'index'])
        ->name('watch-later.index');
    Route::post('/watch-later/{movie}', [WatchLaterController::class, 'store'])
        ->name('watch-later.store');
    Route::delete('/watch-later/{movie}', [WatchLaterController::class, 'destroy'])
        ->name('watch-later.destroy');
});


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('/cardfilm', function () {
    return Inertia::render('CardFilm');
});

Route::get('/api/internal/random-movie', fn () => Movie::inRandomOrder()->first()); //Получение рандомного фильма