<script setup lang="ts">
import { ref, computed, watch, onUnmounted } from 'vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { Head, router } from '@inertiajs/vue3';
// 1. Меняем импорт
import MovieCard from '@/components/MovieCard.vue'; 
import MovieModal from '@/components/MovieModal.vue';
import FilmCard from '@/components/FilmCard.vue';

export interface Film {
  id: number;
  title: string;
  description: string;
  year: number;
  genre: string;
  country: string;
  poster_url?: string;
}

const props = defineProps<{ films: Film[] }>();

const selectedFilm = ref<Film | null>(null);
const isModalOpen = computed(() => selectedFilm.value !== null);

const openModal = (film: Film) => (selectedFilm.value = film);
const closeModal = () => (selectedFilm.value = null);

const removeFromWatchLater = (film: Film) => {
  router.delete(route('watch-later.destroy', { movie: film.id }), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
  });
};

watch(isModalOpen, (open) => {
  document.body.style.overflow = open ? 'hidden' : '';
});
onUnmounted(() => (document.body.style.overflow = ''));
</script>

<template>
  <Head title="Смотреть позже" />
  <MainLayout>
    <div class="watch-later-page" :class="{ 'is-blurred': isModalOpen }">
      <h1 class="page-title">Смотреть позже</h1>

      <div v-if="films.length === 0" class="empty-state">
        Вы ещё не добавили ни один фильм.
      </div>
      <div v-else class="cards-grid">
        <div v-for="film in films" :key="film.id" class="card-cell" @click="openModal(film)">
          <!-- 2. Меняем компонент и передаем пропс movie -->
          <FilmCard
            :film="film"
            :delete-btn="true"
          />
        </div>
      </div>
    </div>

    <!-- <MovieModal
      v-if="selectedFilm"
      :film="selectedFilm"
      @close="closeModal"
      @remove="removeFromWatchLater"
    /> -->
  </MainLayout>
</template>

<style scoped>
/* Стили остаются без изменений */
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

.empty-state {
  text-align: center;
  color: #666;
  font-size: 18px;
  margin-top: 60px;
}
</style>