<script setup lang="ts">
// Каркас карточки, готов к приёму props в будущем
</script>

<template>
  <div class="movie-card">
    <!-- Постер -->
    <div class="card-poster">
      <span>Постер фильма</span>
    </div>
    
    <!-- Информационный блок -->
    <div class="card-info">
      <div class="placeholder-title">Название фильма</div>
      <div class="placeholder-text">Инфо (год, страна)</div>
    </div>
    
    <!-- Кнопка действия -->
    <button class="card-button">Билеты</button>
  </div>
</template>

<style scoped>
.movie-card {
  background-color: #333532; /* Ваш темно-угольный */
  border-radius: 12px;
  padding: 12px;
  display: flex;
  flex-direction: column;
  height: 380px;
  border: 1px solid #8e8e8e; /* Ваш приглушенный серый */
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.movie-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
}

.card-poster {
  flex-grow: 1;
  background-color: rgba(0, 0, 0, 0.4); /* Глубокий темный фон для будущего постера */
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #8e8e8e; /* Ваш приглушенный серый */
  font-size: 14px;
  font-weight: 500;
  border: 1px dashed rgba(142, 142, 142, 0.3);
}

.card-info {
  margin: 12px 0;
}

.placeholder-title {
  color: #bdbdbd; /* Ваш светло-серый */
  font-weight: bold;
  font-size: 16px;
  margin-bottom: 4px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.placeholder-text {
  color: #8e8e8e; /* Ваш приглушенный серый */
  font-size: 13px;
}

.card-button {
  background-color: #b30001; /* Ваш насыщенный красный */
  color: #bdbdbd; /* Ваш светло-серый текст */
  border: none;
  padding: 12px;
  border-radius: 6px;
  cursor: pointer;
  font-weight: bold;
  font-size: 14px;
  width: 100%;
  transition: background-color 0.2s ease;
}

.card-button:hover {
  background-color: #910001; /* Чуть темнее при наведении для интерактивности */
}
</style>
