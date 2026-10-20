<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import FilterSidebar from '@/components/FilterSidebar.vue';
import MovieCard from '@/components/MovieCard.vue';

// Принимаем массив фильмов из бэкенда Laravel Sail
defineProps<{
  movies: Array<{
    id: number;
    title: string;
    year: number;
    genre: string;
    country: string;
    poster_url?: string;
  }>
}>();
</script>

<template>
  <Head title="Каталог фильмов КиноВечер" />
  <div class="flex p-6 gap-6 bg-[#0a0a0a] text-white min-h-screen">
    <aside class="w-1/4">
      <FilterSidebar />
    </aside>
    <main class="w-3/4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-max">
      <!-- Цикл рендерит карточки из базы данных -->
      <MovieCard 
        v-for="movie in movies" 
        :key="movie.id" 
        :movie="movie" 
      />
    </main>
  </div>
</template>
