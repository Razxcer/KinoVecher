<script setup lang="ts">
import { ref, watch } from 'vue';

const props = defineProps<{
  initialFilters?: {
    genre?: string;
    mood?: string;
    rating?: string;
  };
}>();

const emit = defineEmits<{
  (e: 'filter-change', filters: { genre: string; mood: string; rating: string }): void
}>();

const selectedGenre = ref(props.initialFilters?.genre || 'Все жанры');
const selectedMood = ref(props.initialFilters?.mood || 'Любое');
const selectedRating = ref(props.initialFilters?.rating || 'Любой');

const genres = ['Все жанры', 'Фантастика', 'Боевик', 'Драма', 'Комедия', 'Ужасы'];
const moods = ['Любое', 'Веселое', 'Напряженное', 'Грустное'];
const ratings = ['Любой', '0+', '6+', '12+', '16+', '18+'];

watch([selectedGenre, selectedMood, selectedRating], () => {
  emit('filter-change', {
    genre: selectedGenre.value,
    mood: selectedMood.value,
    rating: selectedRating.value
  });
});
</script>

<template>
  <aside class="filter-sidebar">
    <h3>Фильтры</h3>
    <div class="filter-group">
      <label>Жанр</label>
      <select v-model="selectedGenre">
        <option v-for="genre in genres" :key="genre" :value="genre">{{ genre }}</option>
      </select>
    </div>
    <div class="filter-group">
      <label>Настроение</label>
      <select v-model="selectedMood">
        <option v-for="mood in moods" :key="mood" :value="mood">{{ mood }}</option>
      </select>
    </div>
    <div class="filter-group">
      <label>Возрастной рейтинг</label>
      <select v-model="selectedRating">
        <option v-for="rating in ratings" :key="rating" :value="rating">{{ rating }}</option>
      </select>
    </div>
  </aside>
</template>

<style scoped>
.filter-sidebar {
  background-color: #333532;
  padding: 20px;
  border-radius: 12px;
  width: 240px;
  height: fit-content;
  border: 1px solid #8e8e8e;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}
.filter-sidebar h3 { color: #bdbdbd; margin-top: 0; margin-bottom: 20px; font-size: 18px; font-weight: bold; }
.filter-group { margin-bottom: 16px; }
.filter-group label { display: block; color: #8e8e8e; font-size: 13px; margin-bottom: 6px; }
.filter-group select {
  width: 100%;
  padding: 10px;
  background-color: #1a1a1a; /* Изменено: темный фон */
  border: 1px solid #8e8e8e;
  color: #bdbdbd;
  border-radius: 6px;
  font-size: 14px;
  cursor: pointer;
}

.filter-group select option {
  background-color: #222222;
  color: #bdbdbd;
}
.filter-group select:focus {
  border-color: #b30001;
  outline: none;
}
</style>

