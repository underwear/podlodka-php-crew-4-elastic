<?php

// Включаем вывод ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Подключаем composer
require 'vendor/autoload.php';

// ************************************************ //

$dataProvider = new \App\DataProvider();

foreach ($dataProvider->getJsons() as $document) {
    dump($document); // it is string
}