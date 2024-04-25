<?php

namespace App;


class DataProvider
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function getIterator(): \Generator
    {
        // Проверяем, существует ли файл и можно ли его открыть
        if (!file_exists($this->filePath)) {
            throw new \Exception("File not found: {$this->filePath}");
        }

        $handle = fopen($this->filePath, "r");
        if ($handle === false) {
            throw new \Exception("Cannot open file: {$this->filePath}");
        }

        // Чтение заголовков для использования в качестве ключей массива
        $headers = fgetcsv($handle);
        if ($headers === false) {
            throw new \Exception("Failed to read headers from file: {$this->filePath}");
        }

        while (($data = fgetcsv($handle)) !== false) {
            if ($data === null) {
                continue; // Пропускаем пустые строки
            }
            yield array_combine($headers, $data);
        }

        fclose($handle);
    }
}