<script setup lang="ts">
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import FilterSidebar from '@/components/FilterSidebar.vue';
import MovieCard from '@/components/MovieCard.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import FilmCard from '@/components/FilmCard.vue';

// Принимаем массив фильмов из бэкенда Laravel
const props = defineProps<{
  movies: Array<{
    id: number;
    title: string;
    description: string;
    year: number;
    genre: string;
    country: string;
    poster_url?: string;
  }>
}>();

// Объект со значениями активных фильтров
const activeFilters = ref({
  genre: 'Все жанры',
  mood: 'Любое',
  rating: 'Любой'
});

// Функция обновления фильтров при выборе в сайдбаре
const handleFilterChange = (newFilters: { genre: string; mood: string; rating: string }) => {
  activeFilters.value = newFilters;
};

// Логика фильтрации: отбираем только те фильмы, которые подходят под фильтр
const filteredMovies = computed(() => {
  return props.movies.filter(movie => {
    if (activeFilters.value.genre !== 'Все жанры') {
      // Проверяем, содержит ли строка жанров из БД выбранный жанр
      const movieGenres = movie.genre.toLowerCase();
      const selectedGenre = activeFilters.value.genre.toLowerCase();
      if (!movieGenres.includes(selectedGenre)) return false;
    }
    return true;
  });
});
</script>

<template>
  <Head title="Каталог фильмов" />
  <MainLayout>
    <div class="w-full min-h-screen bg-[#0a0a0a] text-[#bdbdbd] p-6 flex justify-center items-start" style="background-color: var(--kino-black);">
      <div class="flex gap-6 w-full max-w-[1600px]">
        
        <!-- Каталог: ровно 5 колонок, фиксированные отступы -->
        <main class="w-4/5 grid grid-cols-5 gap-4 content-start">
          <FilmCard 
            v-for="movie in filteredMovies"
            :film="movie"
            :add-btn="true"
          />
        </main>

        <!-- Фильтр справа -->
        <aside class="w-1/5 min-w-[240px] sticky top-6">
          <FilterSidebar @filter-change="handleFilterChange" />
        </aside>

      </div>
    </div>
  </MainLayout>
</template>
