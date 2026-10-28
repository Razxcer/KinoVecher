<template>
  <div class="card-wrapper">
    <div class="card">
      <div class="poster-container">
        <img
          :src="film.poster_url"
          :alt="film.title"
          class="poster-img"
        />
      </div>

      <div class="info-container">
        <h2 class="movie-title">{{ film.title }}</h2>
        <p class="movie-genres">{{ film.genre }}, {{ film.year }}, {{ film.country }}</p>

        <div class="footer-info">
          <span class="age-rating">{{ film.age_rating }}</span>
          <div class="rating">
            <span class="star">★</span>
            <span class="score">8/10</span>
          </div>
        </div>

        <button v-if="addBtn" @click.stop="createWatchLater" class="card-button">
          Посмотрю позже
        </button>
        <button v-if="deleteBtn" @click.stop="deleteWatchLater" class="card-button">
          Не интересно
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { router } from '@inertiajs/vue3'

const props = defineProps<{
  film: {
    id: number;
    title: string;
    description: string;
    year: number;
    genre: string;
    country: string;
    age_rating: string;
    poster_url?: string;
  };
  deleteBtn?: boolean;
  addBtn?: boolean;
}>()

const createWatchLater = () => {
  router.post(`/watch-later/${props.film.id}`, { }, {
    preserveScroll: true,
  })
}

const deleteWatchLater = () => {
  router.delete(`/watch-later/${props.film.id}`, {
    preserveScroll: true,
  })
}
</script>

<style scoped>
.card-wrapper {
  width: 100%;
  height: 100%;
  display: flex;
}

.card {
  background: #bdbdbd;
  border-radius: 24px;
  padding: 15px 15px 20px 15px; 
  width: 100%;
  min-height: 600px; 
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.poster-container {
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  height: 360px; 
  flex-shrink: 0;
  background-color: #a0a0a0;
}

.poster-img {
  width: 100%;
  height: 100%;
  object-fit: cover; 
  display: block;
}

.info-container {
  color: #333532;
  padding: 12px 5px 0 5px; 
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.movie-title {
  font-size: 20px;
  font-weight: 800;
  margin: 0 0 6px;
  line-height: 1.2;
  color: #333532;
  height: 48px; 
  display: -webkit-box;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.movie-genres {
  font-size: 15px;
  color: #5e5e5e;   
  margin: 0 0 10px;
  line-height: 1.3;
  height: 40px; 
  display: -webkit-box;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.footer-info {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-bottom: 8px;
  /* Прижимаем к низу */
  margin-top: auto; 
}

.age-rating {
  font-size: 14px;
  color: #5e5e5e;
  font-weight: 600;
}

.rating {
  display: flex;
  align-items: center;
  font-weight: bold;
}

.star {
  color: #b30001;
  font-size: 18px;
  margin-right: 5px;
}

.score {
  font-size: 16px;
}

.card-button {
  width: 100%;
  padding: 10px;
  background-color: var(--kino-red, #b30001); 
  border: none;
  border-radius: 10px;
  font-weight: 700;
  font-size: 18px;
  color: #bdbdbd; 
  cursor: pointer;
  transition: all 0.3s ease;
  flex-shrink: 0;
  margin-top: 5px; 
}

.card-button:hover {
  background-color: #d40001;
  color: #ffffff; 
  box-shadow: 0 4px 10px rgba(179, 0, 1, 0.4); 
  transform: translateY(-2px); 
}
</style>