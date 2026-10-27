<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response; // если тип Response возвращается в других методах

class WatchLaterController extends Controller
{
    // Оставляем только этот метод index
    public function index(Request $request)
    {
        $films = $request->user()
            ->watchLater()
            ->orderBy('watch_later.created_at', 'desc')
            ->get();

        return Inertia::render('WatchLater/WatchLaterPage', [
    'films' => $films,
]);
    }

    public function store(Request $request, Movie $movie)
    {
        $request->user()->watchLater()->syncWithoutDetaching([$movie->id]);
        return back();
    }

    public function destroy(Request $request, Movie $movie)
    {
        $request->user()->watchLater()->detach($movie->id);
        return back();
    }
}