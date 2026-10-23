<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');                  // Название фильма
            $table->text('description');            // Описание
            $table->text('poster_url')->nullable();  // URL картинки-постера
            $table->string('genre');                  // Жанры
            $table->integer('year');                  // Год релиза
            $table->string('country');                // Страна производства
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
