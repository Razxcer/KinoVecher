<?php

use App\Http\Controllers\WatchLaterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('main');
})->name('home');




Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('watch-later', [WatchLaterController::class, 'index'])->name('watch-later');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
