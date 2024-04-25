<?php

// Включаем вывод ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Подключаем composer
require 'vendor/autoload.php';

// Создаем client для работы с Elasticsearch
$client = \Elastic\Elasticsearch\ClientBuilder::create()
    ->setHosts(['http://elasticsearch:9200'])
    ->build();

// ************************************************ //
// Пишите свой код здесь :)

dd('Hello from index.php!');