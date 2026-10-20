<script setup lang="ts">
// Пока пустой скрипт, готов к оживлению логики фильтрации
</script>

<template>
  <aside class="filter-sidebar">
    <h3>Фильтры</h3>
    
    <div class="filter-group">
      <label>Жанр</label>
      <select disabled>
        <option>Все жанры</option>
      </select>
    </div>

    <div class="filter-group">
      <label>Настроение</label>
      <select disabled>
        <option>Любое</option>
      </select>
    </div>

    <div class="filter-group">
      <label>Возрастной рейтинг</label>
      <select disabled>
        <option>Любой</option>
      </select>
    </div>
  </aside>
</template>

<style scoped>
.filter-sidebar {
  background-color: #333532; /* Ваш темно-угольный */
  padding: 20px;
  border-radius: 12px;
  width: 240px;
  height: fit-content;
  border: 1px solid #8e8e8e; /* Ваш приглушенный серый */
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
  margin-top: 225px; 
}

.filter-sidebar h3 {
  color: #bdbdbd; /* Ваш светло-серый */
  margin-top: 0;
  margin-bottom: 20px;
  font-size: 18px;
  font-weight: bold;
}

.filter-group {
  margin-bottom: 16px;
}

.filter-group label {
  display: block;
  color: #8e8e8e; /* Ваш приглушенный серый */
  font-size: 13px;
  margin-bottom: 6px;
}

.filter-group select {
  width: 100%;
  padding: 10px;
  background-color: rgba(0, 0, 0, 0.3);
  border: 1px solid #8e8e8e;
  color: #bdbdbd;
  border-radius: 6px;
  font-size: 14px;
  cursor: not-allowed;
}
</style>
