<template>
  <div class="card-wrapper">
    <div class="card">
      <div class="poster-container">
     <img
          :src="film.poster_url || '/picture1.jpg'"
          :alt="film.title"
          class="poster-img"
        />
      </div>

      <div class="info-container">
        <h2 class="movie-title">{{ film.title }}</h2>
        <p class="movie-genres">{{ film.genre }}, {{ film.year }}, {{ film.country }}</p>

        <div class="footer-info">
          <span class="age-rating">{{ film.ageRating }}</span>
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
    ageRating: string;
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
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #fff; 
  font-family: Arial, sans-serif;
}

.card {
  background: #bdbdbd;
  border-radius: 24px;
  padding: 15px;
  width: 100%;
  max-width: 350px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.poster-container {
  border-radius: 16px;
  overflow: hidden;
  margin-bottom: 15px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.poster-img {
  width: 100%;
  display: block;
}

.info-container {
  color: #333532;
  padding: 0 5px;
}

.movie-title {
  font-size: 22px;
  font-weight: 800;
  margin: 0 0 5px;
  line-height: 1.2;
}

.movie-genres {
  font-size: 14px;
  color: #5e5e5e;   /*Немного темнее чем  8E8E8E, чтобы было видно текст*/
  margin: 0 0 15px;
}

.footer-info {
  display: flex;
  align-items: center;
  justify-content: space-between;
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


.card-button{
  width: 100%;
  background-color: var(--kino-red);
  border-radius: 10px;
  font-weight: 600;
  color: var(--kino-black);
}
</style>