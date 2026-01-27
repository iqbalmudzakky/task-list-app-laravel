# Task List

A simple and clean task management web app built with Laravel. Users can create tasks, view details, edit, delete, and toggle completion status. The UI is built with Tailwind CSS (CDN) and enhanced with Alpine.js for lightweight interactions.

## Features

- Create, read, update, and delete tasks
- Toggle task completion status (complete/incomplete)
- Pagination on task list
- Validation with Form Request
- Flash success messages
- Optional detailed notes per task

## Tech Stack

- Laravel 12
- PHP 8.2
- Blade templates
- Tailwind CSS (CDN)
- Alpine.js
- MariaDB/MySQL
- Vite

## Requirements

- PHP 8.2+
- Composer
- Node.js 18+ (or newer) + npm
- MySQL/MariaDB (or Docker)

## Installation

1. Install dependencies:
    - composer install
    - npm install
2. Create environment file and generate key:
    - Copy .env.example to .env
    - php artisan key:generate
3. Configure database in .env:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=task_list
    DB_USERNAME=root
    DB_PASSWORD=root
    ```
4. Run migrations:
    - php artisan migrate
5. Start the app:
    - php artisan serve
    - npm run dev
6. Open: http://localhost:8000

## Docker (Optional Database)

Start MariaDB + Adminer using Docker Compose:

- docker compose up -d

Adminer runs on http://localhost:8080

Update .env to match the Docker database settings if needed.

## Usage

- Create a task from the “New Task” button
- Click a task to view details
- Edit or delete tasks
- Toggle completion status

## Key Routes

- GET /tasks — task list
- GET /tasks/create — create task form
- POST /tasks — store task
- GET /tasks/{task} — task detail
- GET /tasks/{task}/edit — edit task form
- PUT /tasks/{task} — update task
- PATCH /tasks/{task} — toggle completion
- DELETE /tasks/{task} — delete task

## Project Notes

See notes-task-list.md for setup notes and learning references.

## License

This project is for learning and portfolio purposes.
