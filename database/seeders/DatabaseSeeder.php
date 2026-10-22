<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //РАСКОМЕНТИРОВАТЬ ТОЛЬКО ДЛЯ ОДНОРАЗОВОГО СИДИРОВАНИЯ! ПОТОМ ОБРАТНО ЗАКОМЕНТИРОВАТЬ!!!
        
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'), 
            'email_verified_at' => now(),
        ]);

        $this->call(MovieSeeder::class);
    }
}
