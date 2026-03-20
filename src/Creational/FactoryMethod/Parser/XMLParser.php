<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod\Parser;

class XMLParser implements Parser
{
    /**
     * @param string $data
     * @return array<int, array<string, string>>
     * @throws \JsonException
     * @throws \UnexpectedValueException
     */
    public function parse(string $data): array
    {
        $xml = simplexml_load_string($data);

        if ($xml === false) {
            throw new \UnexpectedValueException("Unable to parse XML content");
        }

        $result = [];
        foreach ($xml->children() as $child) {
            $fields = [];
            foreach ($child as $key => $value) {
                $fields[$key] = (string) $value;
            }
            $result[] = $fields;
        }

        return $result;
    }
}
