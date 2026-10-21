<template>
  <div class="modal-overlay" @click.self="closeModal">
    <div class="modal-content">
      <button class="close-btn" @click="closeModal">✕</button>

      <div class="modal-body">
        <div class="modal-poster">
          <img src="picture1.jpg" alt="Постер" />
        </div>

        <div class="modal-info">
          <h1 class="modal-title">Человек-паук: Новый день</h1>

          <p class="modal-description">
            Одинокий и повзрослевший Питер Паркер полностью посвящает себя борьбе с преступностью в Нью-Йорке, поскольку 4 года назад после заклинания Доктора Стрэнджа мир и все близкие забыли его. Но с ростом угрозы и нагрузки на Человека-паука его способности претерпевают странные изменения, способные поставить под угрозу его существование. Тем временем в городе случается новая цепочка преступлений, которая приводит к появлению одного из самых опасных противников в жизни Питера.
          </p>

          <h3 class="about-title">О фильме:</h3>

          <ul class="movie-details">
            <li><span class="label">Год производства:</span> 2026</li>
            <li><span class="label">Страна:</span> США</li>
            <li><span class="label">Жанр:</span> боевик, приключения, фэнтези</li>
            <li><span class="label">Возрастной рейтинг:</span> 12+</li>
            <li><span class="label">Оценка:</span> 8/10</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const emit = defineEmits(['close']);
const closeModal = () => emit('close');
</script>

<style scoped>
.modal-overlay {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.3);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
  padding: 20px;
}

.modal-content {
  background: rgba(189, 189, 189, 0.5);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border-radius: 16px;
  width: 100%;
  max-width: 900px;
  position: relative;
  border: 1px solid rgba(255, 255, 255, 0.3);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  animation: fadeIn 0.3s ease-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.95); }
  to { opacity: 1; transform: scale(1); }
}

.close-btn {
  position: absolute;
  top: 15px;
  right: 15px;
  width: 38px;
  height: 38px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(0, 0, 0, 0.1);
  border: none;
  border-radius: 50%;
  font-size: 18px;
  color: #b30001;
  cursor: pointer;
  z-index: 10;
  transition: transform 0.3s, background-color 0.3s, color 0.3s;
}

.close-btn:hover {
  transform: rotate(90deg);
  background: #b30001;
  color: #fff;
}

.modal-body {
  display: flex;
  padding: 30px;
  gap: 30px;
}

.modal-poster {
  flex: 0 0 300px;
}

.modal-poster img {
  width: 100%;
  border-radius: 12px;
  display: block;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.modal-info {
  flex: 1;
  color: #333532;
}

.modal-title {
  font-size: 28px;
  font-weight: 800;
  margin: 0 0 15px;
}

.modal-description {
  font-size: 15px;
  line-height: 1.5;
  font-weight: 500;
  margin: 0 0 25px;
}

.about-title {
  font-size: 20px;
  font-weight: 800;
  margin: 0 0 15px;
}

.movie-details {
  list-style: none;
  padding: 0;
  margin: 0;
  font-size: 15px;
  line-height: 2;
}

.label {
  color: #b30001;
  font-weight: 700;
  margin-right: 5px;
}

@media (max-width: 768px) {
  .modal-body {
    flex-direction: column;
    padding: 20px;
    gap: 20px;
  }

  .modal-poster {
    flex: auto;
    max-width: 250px;
    margin: 0 auto;
  }
}
</style>