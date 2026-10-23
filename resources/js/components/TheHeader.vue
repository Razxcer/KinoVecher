<script setup>
import { usePage, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
// Проверяем, авторизован ли пользователь
const isAuth = computed(() => !!page.props.auth.user);

</script>

<template>
    <header class="header">
    <!-- 1. Логотип -->
    <Link href="/">
    <div class="logo">
      <img src="/kino-ico.png" alt="Логотип" class="logo-img">
    </div>
    </Link>

    <!-- 2. Поле поиска -->
    <div class="search-container">
      <input type="text" placeholder="" class="search-input" />
      <!-- Аккуратная SVG лупа -->
      <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
      </svg>
    </div>

    <!-- 3. Блок с кнопками -->
    <div class="buttons-group">
      <Link href="#">
      <button class="nav-btn">Случайный<br>фильм</button>
      </Link>
      <div class="divider"></div>
      <Link href="/watch-later">
      <button class="nav-btn">Смотреть<br>позже</button>
      </Link>
    </div>

    <!-- 4. Иконка профиля -->
    <Link href="/profile" v-if="isAuth">
    <div class="profile-icon">
  <!-- Минималистичный SVG силуэт -->
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
        </svg>
    </div>
    </Link>

    <Link href="/login" v-else>
    <div class="profile-icon">
  <!-- Минималистичный SVG силуэт -->
       <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
        </svg>
    </div>
    </Link>
  </header>
</template>

<style scoped>
/* Шапка: размеры плавно подстраиваются под ширину экрана */
.header {
    width: 100%;
    height: 60px;
    z-index: 9999;


  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  background-color: var(--kino-gray);
  padding: 2px clamp(12px, 2vw, 24px);
  gap: 12px clamp(12px, 2vw, 22px);
  font-family: Arial, sans-serif;
  box-sizing: border-box;
}

/* Логотип не сжимается */
.logo {
  display: flex;
  align-items: center;
  flex: 0 0 auto;
}

.logo-img {
  display: block;
  width: clamp(48px, 5vw, 60px);
  height: auto;
  max-height: 60px;
  object-fit: contain;
}

/* Поиск занимает свободное место, но не вытесняет остальные элементы */
.search-container {
  position: relative;
  flex: 1 1 180px;
  min-width: 0;
  max-width: 400px;
  transition: transform 0.2s;
}

.search-container:hover {
  transform: scale(1.01);
}

.search-input {
  display: block;
  box-sizing: border-box;
  width: 100%;
  height: 40px;
  padding: 6px 42px 6px 16px;
  border-radius: 40px;
  border: none;
  background-color: var(--kino-white);
  outline: none;
  color: var(--kino-black);
  font-size: clamp(14px, 1.3vw, 18px);
}

.search-icon {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  width: 23px;
  height: 23px;
  cursor: pointer;
  opacity: 0.7;
  transition: opacity 0.2s ease;
}

.search-icon:hover {
  opacity: 1;
}

/* Кнопки навигации */
.buttons-group {
  display: flex;
  align-items: center;
  justify-content: center;
  flex: 0 0 auto;
  gap: clamp(6px, 1vw, 12px);
}

.nav-btn {
  background-color: var(--kino-black);
  color: var(--kino-white);
  border: none;
  border-radius: 8px;
  padding: 7px clamp(8px, 1.2vw, 14px);
  font-size: clamp(13px, 1.35vw, 18px);
  font-weight: bold;
  text-align: center;
  cursor: pointer;
  line-height: 1.2;
  white-space: nowrap;
  transition: transform 0.2s;

  height: 50px;
}

.nav-btn:hover {
  transform: scale(1.03);
}

.divider {
  width: 3px;
  height: 38px;
  flex: 0 0 3px;
  background-color: var(--kino-black);
}

/* Профиль */
.profile-icon {
  background-color: var(--kino-black);
  width: clamp(42px, 5vw, 54px);
  height: clamp(42px, 5vw, 54px);
  flex: 0 0 auto;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: transform 0.2s;
}

.profile-icon:hover {
  transform: scale(1.04);
}

.user-svg {
  width: 68%;
  height: 68%;
}

/* Планшеты и небольшие ноутбуки */
@media (max-width: 800px) {
  .header {
    gap: 10px 14px;
    padding: 10px 14px;
  }

  .search-container {
    order: 3;
    flex: 1 1 100%;
    max-width: none;
  }

  .buttons-group {
    margin-left: auto;
  }
}

/* Телефоны */
@media (max-width: 480px) {
  .header {
    padding: 10px 12px;
    gap: 10px;
  }

  .logo-img {
    width: 38px;
    max-height: 38px;
  }

  .profile-icon {
    width: 42px;
    height: 42px;
  }

  .buttons-group {
    gap: 6px;
  }

  .nav-btn {
    padding: 7px 8px;
    font-size: 12px;
    border-radius: 7px;
  }

  .divider {
    height: 30px;
    width: 2px;
    flex-basis: 2px;
  }

  .search-container {
    flex-basis: 100%;
  }

  .search-input {
    height: 38px;
    font-size: 14px;
  }
}

/* Очень узкие экраны */
@media (max-width: 350px) {
  .header {
    gap: 8px;
    padding-inline: 8px;
  }

  .buttons-group {
    gap: 4px;
  }

  .nav-btn {
    padding-inline: 6px;
    font-size: 11px;
  }
}
</style>