# KinoVecher

КиноВечер - проект созданный для простого и быстрого поиска фильмов на вечер!

## Стек технологий

- **Backend:** Laravel 12
- **Frontend:** Vue 3 (Composition API) + Inertia.js
- **Сборщик:** Vite
- **База данных:**  MySQL
- **Стили:** Tailwind CSS

---

## Требования к окружению

Перед началом убедитесь, что у вас установлены:
- PHP >= 8.2
- Node.js >= 22.x
- MySQL = 8.4

---

## Быстрый старт

Выполните следующие шаги по порядку, чтобы запустить проект локально.

### 1. Клонирование и подготовка env
```bash
git clone https://github.com/Razxcer/KinoVecher.git
cd KinoVecher

# Установка зависимостей Composer
composer install

# Создание файла окружения
cp .env.example .env

# Генерация ключа приложения
php artisan key:generate
```

### 2. Настройка базы данных
1. Создайте пустую базу данных в вашей СУБД.
2. Откройте файл `.env` и укажите данные для подключения:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=имя_вашей_бд
   DB_USERNAME=ваш_логин
   DB_PASSWORD=ваш_пароль
   ```
3. Запустите миграции и сидеры (наполнение тестовыми данными):
   ```bash
   php artisan migrate --seed
   ```

### 3. Настройка фронтенда
Установите JavaScript-зависимости:
```bash
npm install
```

---

##  Порядок запуска проекта

### Шаг A: Запуск бэкенд-сервера
```bash
php artisan serve
```
Приложение станет доступно по адресу: `http://127.0.0.1:8000`

### Шаг B: Запуск Vite (фронтенд)
Эта команда запускает сервер разработки Vite, который компилирует Vue-компоненты «на лету» и обеспечивает Hot Module Replacement (HMR) через Inertia.
```bash
npm run dev
```

---

## Альтернативный запуск через Laravel Sail (Docker)

Если в проекте настроен Docker (Laravel Sail), весь запуск сводится к нескольким командам:

```bash
# 1. Установка PHP зависимостей через временный контейнер
docker run --rm \
    -u "(id -u):(id -g)" \
    -v "\$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-cli:latest \
    composer install

# 2. Настройка окружения
cp .env.example .env

# 3. Запуск контейнеров (в бэкграунде)
./vendor/bin/sail up -d

# 4. Генерация ключа и миграции
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed

# 5. Установка и запуск фронтенда
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```
Приложение будет доступно на `http://localhost`.

---

## Сборка для продакшна

Перед деплоем на боевой сервер не забудьте собрать фронтенд-ресурсы в оптимизированные статичные файлы:
```bash
npm run build
```

## Полезные команды

- `php artisan route:list` — посмотреть все доступные роуты (включая веб-роуты Inertia).
- `php artisan inertia:start-ssr` — запустить Server-Side Rendering (если он у вас настроен).
