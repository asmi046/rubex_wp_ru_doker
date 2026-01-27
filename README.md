# RubEx WP RU Docker

Минимальный Docker-окружение для WordPress и тема RubEx.

## Запуск
1. docker-compose up -d
2. Открой http://localhost:8091

## Скрипты
- npm start — Gulp + BrowserSync
- npm run sync:theme — синхронизация темы на сервер
- npm run sync:plugins — синхронизация плагинов на сервер
- npm run sync:all — синхронизация темы и плагинов

## Структура
- wp-content/themes/rubex — тема
- wp-content/plugins — плагины

## Требования
- Docker
- Node.js 18+ и npm
