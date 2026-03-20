<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod\Parser;

class CSVParser implements Parser
{
    public function parse(string $data): array
    {
        $lines = explode(PHP_EOL, $data);
        $result = [];
        foreach ($lines as $line) {
            if (trim($line) !== '') {
                // empty escape: required by PHPStan and avoids PHP 8.4 deprecation
                $result[] = str_getcsv($line, ',', '"', '');
            }
        }
        return $result;
    }
}
