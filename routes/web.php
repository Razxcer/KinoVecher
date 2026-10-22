<?php

use App\Models\Movie;

use App\Http\Controllers\WatchLaterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('main');
})->name('home');

Route::get('/catalog', function () {
    return Inertia::render('Catalog', [
        'movies' => Movie::all()
    ]);
})->name('catalog');


Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/watch-later', [WatchLaterController::class, 'index'])
        ->name('watch-later.index');
    Route::post('/watch-later/{movie}', [WatchLaterController::class, 'store'])
        ->name('watch-later.store');
    Route::delete('/watch-later/{movie}', [WatchLaterController::class, 'destroy'])
        ->name('watch-later.destroy');
});

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
