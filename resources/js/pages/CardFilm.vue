<template>
  <div class="page-container">
    <div class="catalog-grid">

      <div 
        v-for="movie in movies" 
        :key="movie.id" 
        @click="openModal(movie)" 
        class="clickable-card"
      >
        <FilmCard :film="movie" />
      </div>
    </div>


    <MovieModal 
      v-if="selectedMovie" 
      :film="selectedMovie" 
      @close="selectedMovie = null" 
    />
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import FilmCard from '../components/FilmCard.vue'
import MovieModal from '../components/MovieModal.vue'

const movies = ref([
  {
    id: 1,
    title: 'Человек-паук: Новый день',
    year: 2026,
    genre: 'боевик, приключения, фэнтези',
    country: 'США',
    ageRating: '12+',
    poster_url: '/picture1.jpg'
  }
])

const selectedMovie = ref<any>(null)
const openModal = (movie: any) => {
  selectedMovie.value = movie
}
</script>

<style scoped>
.page-container {
  padding: 40px;
  background: #f0f0f0;
  min-height: 100vh;
}

.catalog-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 30px;
  justify-items: center;
}

.clickable-card {
  cursor: pointer;
  transition: transform 0.2s ease;
}

.clickable-card:hover {
  transform: scale(1.02);
}
</style>