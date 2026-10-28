<script setup lang="ts">
import { ref } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import FilterSidebar from '@/components/FilterSidebar.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import FilmCard from '@/components/FilmCard.vue';
import MovieModal from '@/components/MovieModal.vue';

const props = defineProps<{
  movies: Array<{
    id: number;
    title: string;
    description: string;
    year: number;
    genre: string;
    country: string;
    age_rating: string;
    mood: string;
    poster_url?: string;
  }>;
 
  filters?: {
    search?: string;
    genre?: string;
    mood?: string;
    rating?: string;
  };
}>();


const currentFilters = ref({
  genre: props.filters?.genre || 'Все жанры',
  mood: props.filters?.mood || 'Любое',
  rating: props.filters?.rating || 'Любой'
});

const updateFilters = () => {
  router.get('/', {
    search: props.filters?.search || '', // Сохраняем строку поиска из чужой шапки
    genre: currentFilters.value.genre,
    mood: currentFilters.value.mood,
    rating: currentFilters.value.rating
  }, {
    preserveState: true,
    replace: true
  });
};

const handleFilterChange = (newFilters: { genre: string; mood: string; rating: string }) => {
  currentFilters.value = newFilters;
  updateFilters();
};

const selectedMovie = ref<any>(null)
const openModal = (movie: any) => {
  selectedMovie.value = movie
}
</script>

<template>
  <Head title="Каталог фильмов" />
  <MainLayout>
    <div class="w-full min-h-screen bg-[#0a0a0a] text-[#bdbdbd] p-6 flex flex-col items-center" style="background-color: var(--kino-black);">
      <div class="flex gap-6 w-full max-w-[1600px] mt-4">
        
        <main class="w-4/5 grid grid-cols-5 gap-4 content-start">
          <FilmCard 
            v-for="movie in props.movies"
            :key="movie.id"
            :film="movie"
            :add-btn="true"
            @click="openModal(movie)" 
          />
          <MovieModal
            v-if="selectedMovie" 
            :film="selectedMovie" 
            @close="selectedMovie = null" 
            :addBtn="true"
          />
          <div v-if="props.movies.length === 0" class="col-span-5 text-center text-gray-500 py-12">
            Фильмы по выбранным критериям не найдены.
          </div>
        </main>

        <aside class="w-1/5 min-w-[240px] sticky top-6">
          <FilterSidebar :initial-filters="currentFilters" @filter-change="handleFilterChange" />
        </aside>

      </div>
    </div>
  </MainLayout>
</template>
