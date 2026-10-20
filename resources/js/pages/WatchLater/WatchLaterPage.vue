<script setup lang="ts">
import { ref, computed, watch, onUnmounted } from 'vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import FilmCard from '@/components/FilmCard.vue';
import MovieModal from '@/components/MovieModal.vue';

interface Film {
  id: number;
  title: string;
}

// FilmCard пока без props — рендерим несколько "заглушек"
const films = ref<Film[]>([
  { id: 1, title: 'Человек-паук: Новый день' },
  { id: 2, title: 'Человек-паук: Новый день' },
  { id: 3, title: 'Человек-паук: Новый день' },
]);

const selectedFilm = ref<Film | null>(null);
const isModalOpen = computed(() => selectedFilm.value !== null);

const openModal = (film: Film) => {
  selectedFilm.value = film;
};

const closeModal = () => {
  selectedFilm.value = null;
};

// Блокируем скролл body, пока открыта модалка
watch(isModalOpen, (open) => {
  document.body.style.overflow = open ? 'hidden' : '';
});

onUnmounted(() => {
  document.body.style.overflow = '';
});
</script>

<template>
  <Head title="Смотреть позже" />
  <MainLayout>
    <div class="watch-later-page" :class="{ 'is-blurred': isModalOpen }">
      <h1 class="page-title">Смотреть позже</h1>

      <div class="cards-grid">
        <div
          v-for="film in films"
          :key="film.id"
          class="card-cell"
          @click="openModal(film)"
        >
          <FilmCard />
        </div>
      </div>
    </div>

    <!-- Сам модал управляется MovieModal, close пробрасываем -->
    <MovieModal v-if="selectedFilm" @close="closeModal" />
  </MainLayout>
</template>

<style scoped>
.watch-later-page {
  padding: 40px 20px;
  background: #fff;
  min-height: 100vh;
  transition: filter 0.35s ease;
  background-image: url("BG.jpg");
  background-size: cover; 
  background-position: center; 
  background-repeat: no-repeat;
}

.watch-later-page.is-blurred {
  pointer-events: none;
  background-image: linear-gradient(135deg, rgba(20, 20, 20, 0.7) 0%, rgba(20, 20, 20, 0.7) 100%),
        url('./../../../../public/BG.jpg');
}

.page-title {
  font-size: 32px;
  font-weight: 800;
  color: #333532;
  margin: 0 0 30px;
  text-align: center;
  font-family: Arial, sans-serif;
}

.cards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 24px;
  max-width: 1400px;
  margin: 0 auto;
}

.card-cell {
  cursor: pointer;
}
</style>