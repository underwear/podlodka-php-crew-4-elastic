# ELASTIC SEARCH WORKSHOP

## Подготовка

> Для запуска проекта вам нужен установленный docker и docker-compose.

### Шаг 1. Запустите контейнеры

Для запуска контейнеров выполните команду в терминале:

```shell
docker-compose up -d
```
Данная команда запустит:
- php built-in webserver на `8000` порту
- elasticsearch на `9200` порту
- kibana на `5601` порту

(можете поменять порты в `docker-compse.yml`)

Подождите некоторое время, пока elasticsearch и kibana запустятся

### Шаг 2. Выполните composer install

```shell
docker compose run --rm app composer install
```

## Задания

### Задание 1 - Знакомство с Kibana

Откройте **Kibana** по адресу http://localhost:5601

Используя **Dev Tools** создайте индекс `articles`:

```
PUT /articles
{
  "mappings": {
    "properties": {
      "id": {
        "type": "integer"
      },
      "title": {
        "type": "text"
      },
      "body": {
        "type": "text"
      },
      "tags": {
        "type": "keyword"
      },
      "date": {
        "type": "date"
      }
    }
  }
}
```

Затем добавьте в индекс новый документы, выполнив команды:

```
POST /articles/_doc
{
  "title": "What I love",
  "body": "I love php and podlodka"
}

POST /articles/_doc
{
  "title": "What I also love",
  "body": "I love beer"
}

POST /articles/_doc
{
  "title": "What I hate",
  "body": "I hate javascript"
}
```

Затем произведите поиск по вставленным документам и найдите вхождение слова `srver` в поле `body`:

```
GET /articles/_search?q=body:srver
```

### Задание 2 - PHP + elasticsearch

Откройте bash контейнера php:

```shell
docker compose run --rm -it app bash
```

#### Шаг 1
Воспользовавшись [документацией](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting-started-php.html), подключите в проект пакет `elasticsearch/elasticseach`

#### Шаг 2
Вам необходимо отредактировать `index.php` так, чтобы при его запуске он запушил все документы из папки `./dev-test-data` в наш elasticsearch, при этом сохраняя их id

Для этого вам все также поможет [документация](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting-started-php.html).

Затем, используя Dev Tool, убедитесь, что документы запушены корректно, и они доступны через запросы:

```
GET articles/_doc/1

GET articles/_doc/2

GET articles/_doc/3

GET articles/_doc/4

GET articles/_doc/5
```

#### Шаг 3

Отредактируйте `index.php` так, чтобы он обращался в elasticsearch и выводил на экран результаты поиска по запросу `Sysoev Igor` (не строгий поиск)

docs: https://www.elastic.co/guide/en/elasticsearch/reference/8.13/query-dsl-match-query.html#query-dsl-match-query


#### Шаг 4

Отредактируйте `index.php`, cделайте поиск по "open source", но чтобы дата публикации была не старше 2022 года

Пример запроса:

```
GET /articles/_search
{
  "query": {
    "bool": {
      "must": [
        {
          "match": {
            "body": "open source" 
          }
        },
        {
          "range": {
            "date": {
              "gte": "2022-01-01" 
            }
          }
        }
      ]
    }
  }
}
```

### Шаг 5

@todo