<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Человек-паук: Новый день', 
                'genre' => 'Боевик, приключения, фэнтези', 
                'year' => 2026, 
                'country' => 'США', 
                'poster_url' => 'https://static.kinoafisha.info/k/movie_posters/1080x1920/upload/movie_posters/5/1/5/8374515/101283994502.jpg'
            ],
            [
                'title' => 'Последний богатырь. Колобок', 
                'genre' => 'Семейный, фэнтези', 
                'year' => 2026, 
                'country' => 'Россия', 
                'poster_url' => 'https://static.kinoafisha.info/k/movie_posters/1080x1920/upload/movie_posters/0/2/4/8382420/334539226583.jpg'
            ],
            [
                'title' => 'Дом мертвых', 
                'genre' => 'Ужасы', 
                'year' => 2025, 
                'country' => 'Таиланд', 
                'poster_url' => 'https://static.kinoafisha.info/k/movie_posters/1080x1920/upload/movie_posters/1/8/8/8386881/154654894708.jpg'
            ],
            [
                'title' => 'Мятеж', 
                'genre' => 'Боевик, триллер, криминал', 
                'year' => 2026, 
                'country' => 'США', 
                'poster_url' => 'https://static.kinoafisha.info/k/movie_posters/1080x1920/upload/movie_posters/8/6/7/8380768/816421671980.jpg'
            ],
            [
                'title' => 'Курьер', 
                'genre' => 'Боевик, триллер', 
                'year' => 2026, 
                'country' => 'США', 
                'poster_url' => 'https://static.kinoafisha.info/k/movie_posters/1080x1920/upload/movie_posters/4/4/5/8385544/147907068542.jpg'
            ],
            [
                'title' => 'Натиск', 
                'genre' => 'Боевик, ужасы, триллер', 
                'year' => 2026, 
                'country' => 'США', 
                'poster_url' => 'https://static.kinoafisha.info/k/movie_posters/1080x1920/upload/movie_posters/7/0/6/8386607/196249034691.jpg'
            ],
            [
                'title' => 'Охота на императора', 
                'genre' => 'Исторический', 
                'year' => 2026, 
                'country' => 'Россия', 
                'poster_url' => 'https://static.kinoafisha.info/k/movie_posters/1080x1920/upload/movie_posters/2/7/6/8382672/230907580767.jpg'
            ],
            [
                'title' => 'Надежда', 
                'genre' => 'Боевик, ужасы, детектив', 
                'year' => 2026, 
                'country' => 'Южная Корея', 
                'poster_url' => 'https://static.kinoafisha.info/k/movie_posters/1080x1920/upload/movie_posters/8/5/9/8385958/829880236233.jpg'
            ],
            [
                'title' => 'Пункт назначения. Рука смерти', 
                'genre' => 'Драма, ужасы', 
                'year' => 2026, 
                'country' => 'Тайвань', 
                'poster_url' => 'https://static.kinoafisha.info/k/movie_posters/1080x1920/upload/movie_posters/0/2/3/8387320/620681945060.jpg'
            ],
            [
                'title' => 'Восставший', 
                'genre' => 'Боевик, драма, исторический', 
                'year' => 2026, 
                'country' => 'Германия', 
                'poster_url' => 'https://static.kinoafisha.info/k/movie_posters/1080x1920/upload/movie_posters/5/6/8/8386865/810368870391.jpg'
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
