<?php

namespace Src\Helper;

use InvalidArgumentException;
use RuntimeException;
use Throwable;

class JsonReader
{
    public function read(string $path): array
    {
        try {
            $content = json_decode(file_get_contents($path), true);

            return $content;
        } catch (Throwable $e) {
            throw new RuntimeException("Error reading JSON content of file $path: " . $e->getMessage());
        }
    }
}