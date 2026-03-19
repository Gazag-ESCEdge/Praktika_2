# Rucheek Shop

Интернет-магазин Rucheek - современное веб-приложение для продажи товаров.

## Технологический стек

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Vue.js 3 + Vue Router
- **Стили**: Tailwind CSS 4 + SCSS
- **Сборка**: Vite
- **HTTP-клиент**: Axios
- **База данных**: MySQL
- **Сервер**: Laravel Sail (опционально)

## Требования

- PHP 8.2 или выше
- Composer
- Node.js 18+ и npm
- Git
- MySQL 8.0+

## Установка

### 1. Клонирование репозитория

```bash
git clone <ваш-репозиторий>
cd rucheek-shop
```

### 2. Установка PHP-зависимостей

```bash
composer install
```

### 3. Установка JavaScript-зависимостей

```bash
npm install
```

### 4. Настройка окружения

Скопируйте файл окружения:

```bash
cp .env.example .env
```

Сгенерируйте ключ приложения:

```bash
php artisan key:generate
```

### 5. Настройка базы данных

Проект использует MySQL. Настройте подключение в файле `.env`:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rucheek_shop
DB_USERNAME=root
DB_PASSWORD=
```

Создайте базу данных в MySQL:

```sql
CREATE DATABASE rucheek_shop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
В папке с проектом есть файл db.sql, который содержит код для создания всех необходимых таблиц.

### 6. Выполнение миграций

```bash
php artisan migrate
```

## Запуск проекта

### Режим разработки

Для запуска в режиме разработки используйте команду:

```bash
npm run dev
```

Эта команда запустит:
- Laravel development server
- Vite development server
- Laravel queue listener
- Laravel pail (логи)

### Альтернативный запуск

Если нужно запустить только Laravel сервер:

```bash
php artisan serve
```

А затем в отдельном терминале запустить Vite:

```bash
npm run dev
```

### Сборка для продакшена

```bash
npm run build
```

## Структура проекта

```
rucheek-shop/
├── app/                    # Laravel приложение
│   ├── Http/              # Контроллеры API
│   │   └── Controllers/Api/
│   │       ├── AuthController.php
│   │       ├── CartController.php
│   │       ├── CategoryController.php
│   │       ├── OrderController.php
│   │       ├── ProductController.php
│   │       └── ReviewController.php
│   └── Models/            # Eloquent модели
├── resources/
│   ├── js/                # Vue.js приложение
│   │   ├── app.js         # Главный файл приложения
│   │   ├── App.vue        # Главный компонент
│   │   ├── router/        # Маршрутизация
│   │   ├── pages/         # Страницы приложения
│   │   └── components/    # Компоненты
│   └── css/               # Стили
│       ├── app.css        # Главный CSS файл
│       ├── styles.scss    # Основные стили
│       └── colors.scss    # Цветовая схема
├── routes/
│   ├── api.php           # API маршруты
│   └── web.php           # Web маршруты
└── database/
    ├── migrations/       # Миграции базы данных
    └── seeders/          # Сиды данных
```

## Доступные команды

### Laravel команды

```bash
# Запуск development сервера
php artisan serve

# Выполнение миграций
php artisan migrate

# Генерация ключа приложения
php artisan key:generate

# Очистка кэша
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### NPM команды

```bash
# Установка зависимостей
npm install

# Запуск в режиме разработки
npm run dev

# Сборка для продакшена
npm run build
```

## API Endpoints

Основные API маршруты доступны по адресу `/api/`:

- `POST /api/auth/login` - Авторизация
- `POST /api/auth/register` - Регистрация
- `GET /api/products` - Список товаров
- `GET /api/products/{id}` - Детали товара
- `GET /api/categories` - Список категорий
- `GET /api/cart` - Корзина пользователя
- `POST /api/orders` - Оформление заказа
- `GET /api/reviews` - Отзывы о товарах

## Разработка

### Добавление новых моделей

1. Создайте модель в `app/Models/`
2. Создайте миграцию: `php artisan make:migration create_model_table`
3. Выполните миграцию: `php artisan migrate`

### Добавление API контроллеров

1. Создайте контроллер в `app/Http/Controllers/Api/`
2. Добавьте маршруты в `routes/api.php`

### Добавление Vue компонентов

1. Создайте компонент в `resources/js/components/`
2. Импортируйте и зарегистрируйте в `resources/js/app.js`