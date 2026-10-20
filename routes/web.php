<?php

use App\Models\Movie;
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

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
