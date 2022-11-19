<?php

namespace silverorange\DevTest\Service;

final class JsonParser
{
    public static function getJsonData(string $path): array
    {
        $jsonData = [];
        $postsFiles = array_diff(scandir($path), ['..', '.']);

        foreach ($postsFiles as $fileName) {
            $jsonData[] = json_decode(file_get_contents($path . DIRECTORY_SEPARATOR . $fileName), false);
        }

        return $jsonData;
    }
}
