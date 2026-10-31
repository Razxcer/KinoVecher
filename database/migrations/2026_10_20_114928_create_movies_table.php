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
            $table->string('title');
            $table->text('description');
            $table->text('poster_url')->nullable();
            $table->string('genre');
            $table->integer('year');
            $table->string('country');
            $table->string('age_rating')->default('0+');
            $table->string('rating')->default('8/10');
            $table->string('mood')->default('Любое');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
