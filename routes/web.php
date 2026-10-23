<?php

use App\Http\Controllers\WatchLaterController;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Catalog', [
        'movies' => Movie::all()
    ]);
})->name('home');

Route::get('/catalog', function () {
    return Inertia::render('Catalog', [
        'movies' => Movie::all()
    ]);
})->name('catalog');

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('profile', function () {
    return Inertia::render('Profile');
})->middleware('auth')->name('profile');


Route::get('watch-later', [WatchLaterController::class, 'index'])->name('watch-later');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('/cardfilm', function () {
    return Inertia::render('CardFilm');
});
