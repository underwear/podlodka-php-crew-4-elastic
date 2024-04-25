# Запуск Elasticsearch и Kibana локально

> Для запуска проекта вам нужен установленный docker и docker-compose.

### Шаг 1. Запустите контейнеры

Для запуска контейнеров выполните команду в терминале:

```shell
docker-compose up -d
```
Данная команда запустит:н
- php built-in webserver на `8000` порту
- elasticsearch на `9200` порту
- kibana на `5601` порту

(можете поменять порты в `/docker-compse.yml`)

Подождите некоторое время, пока elasticsearch и kibana запустятся

### Шаг 2. Выполните composer install

```shell
docker compose run --rm app composer install
```