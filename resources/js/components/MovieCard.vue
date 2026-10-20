<script setup lang="ts">
interface Movie {
  title: string;
  poster_url?: string;
  year: number;
  country?: string;
}

defineProps<{
  movie: Movie;
}>();
</script>

<template>
  <div class="movie-card">
    <div class="card-poster">
      <img v-if="movie.poster_url" :src="movie.poster_url" :alt="movie.title" class="poster-image" />
      <span v-else>Постер фильма</span>
    </div>

    <div class="card-info">
      <div class="placeholder-title">{{ movie.title }}</div>
      <div class="placeholder-text">
        {{ movie.year }} {{ movie.country ? `· ${movie.country}` : '' }}
      </div>
    </div>

    <button class="card-button">Билеты</button>
  </div>
</template>

<style scoped>
.movie-card {
  background-color: #333532;
  border-radius: 12px;
  padding: 12px;
  display: flex;
  flex-direction: column;
  height: 380px;
  border: 1px solid #8e8e8e;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.movie-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
}
.card-poster {
  flex-grow: 1;
  background-color: rgba(0, 0, 0, 0.4);
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #8e8e8e;
  font-size: 14px;
  font-weight: 500;
  border: 1px dashed rgba(142, 142, 142, 0.3);
  overflow: hidden;
}
.poster-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.card-info { margin: 12px 0; }
.placeholder-title {
  color: #bdbdbd;
  font-weight: bold;
  font-size: 16px;
  margin-bottom: 4px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.placeholder-text { color: #8e8e8e; font-size: 13px; }
.card-button {
  background-color: #b30001;
  color: #bdbdbd;
  border: none;
  padding: 12px;
  border-radius: 6px;
  cursor: pointer;
  font-weight: bold;
  font-size: 14px;
  width: 100%;
  transition: background-color 0.2s ease;
}
.card-button:hover { background-color: #910001; }
</style>
