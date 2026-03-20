<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod\Parser;

use JsonException;

class JSONParser implements Parser
{
    /**
     * @return array<mixed>
     * @throws JsonException
     * @throws \UnexpectedValueException
     */
    public function parse(string $data): array
    {
        $result = json_decode($data, true, 512, JSON_THROW_ON_ERROR);
        if (!is_array($result)) {
            throw new \UnexpectedValueException('Expected JSON to decode to array.');
        }
        return $result;
    }
}
