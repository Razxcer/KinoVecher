<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::query()
            // 1. Ловим поиск из шапки (по названию или описанию)
            ->when($request->input('search'), function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            })
            // 2. Ловим жанр из сайдбара
            ->when($request->input('genre'), function ($query, $genre) {
                if ($genre !== 'Все жанры') {
                    $query->where('genre', 'like', "%{$genre}%");
                }
            })
            // 3. Ловим настроение из сайдбара
            ->when($request->input('mood'), function ($query, $mood) {
                if ($mood !== 'Любое') {
                    $query->where('mood', $mood);
                }
            })
            // 4. Ловим возрастной рейтинг из сайдбара
            ->when($request->input('rating'), function ($query, $rating) {
                if ($rating !== 'Любой') {
                    $query->where('age_rating', $rating);
                }
            })
            ->latest()
            ->get();    

        return Inertia::render('Catalog', [
            'movies' => $movies,
            // Отдаем параметры фильтров обратно во Vue
            'filters' => $request->only(['search', 'genre', 'mood', 'rating']),
        ]);
    }
}
