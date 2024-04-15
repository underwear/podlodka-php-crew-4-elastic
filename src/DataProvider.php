<?php

namespace App;

class DataProvider
{
    private const DIR_PATH = './dev-test-data';

    /**
     * @return array<int, string>
     */
    public function getJsons(): array
    {
        $jsonFiles = [];
        $allFiles = scandir(self::DIR_PATH);

        foreach ($allFiles as $file) {
            if (is_file(self::DIR_PATH . '/' . $file) && pathinfo($file, PATHINFO_EXTENSION) === 'json') {
                $jsonFiles[] = file_get_contents(self::DIR_PATH . '/' . $file);
            }
        }

        return $jsonFiles;
    }
}
