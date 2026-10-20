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
                'poster_url' => 'https://yandex.net'
            ],
            [
                'title' => 'Последний богатырь. Колобок', 
                'genre' => 'Семейный, фэнтези', 
                'year' => 2026, 
                'country' => 'Россия',
                'poster_url' => 'https://yandex.net'
            ],
            [
                'title' => 'Дом мертвых', 
                'genre' => 'Ужасы', 
                'year' => 2025, 
                'country' => 'Таиланд',
                'poster_url' => 'https://yandex.net'
            ],
            [
                'title' => 'Мятеж', 
                'genre' => 'Боевик, триллер, криминал', 
                'year' => 2026, 
                'country' => 'США',
                'poster_url' => 'https://yandex.net'
            ],
            [
                'title' => 'Курьер', 
                'genre' => 'Боевик, триллер', 
                'year' => 2026, 
                'country' => 'США',
                'poster_url' => 'https://yandex.net'
            ],
            [
                'title' => 'Натиск', 
                'genre' => 'Боевик, ужасы, триллер', 
                'year' => 2026, 
                'country' => 'США',
                'poster_url' => 'https://yandex.net'
            ],
            [
                'title' => 'Охота на императора', 
                'genre' => 'Исторический', 
                'year' => 2026, 
                'country' => 'Россия',
                'poster_url' => 'https://yandex.net'
            ],
            [
                'title' => 'Надежда', 
                'genre' => 'Боевик, ужасы, детектив', 
                'year' => 2026, 
                'country' => 'Южная Корея',
                'poster_url' => 'https://yandex.net'
            ],
            [
                'title' => 'Пункт назначения. Рука смерти', 
                'genre' => 'Драма, ужасы', 
                'year' => 2026, 
                'country' => 'Тайвань',
                'poster_url' => 'https://yandex.net'
            ],
            [
                'title' => 'Восставший', 
                'genre' => 'Боевик, драма, исторический', 
                'year' => 2026, 
                'country' => 'Германия',
                'poster_url' => 'https://yandex.net'
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
