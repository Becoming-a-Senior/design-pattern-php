<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\TemplateMethod\DataProcessor;

class JSONDataProcessor extends DataProcessor
{
    /**
     * @return DataRecord[]
     * @throws \JsonException
     * @throws \UnexpectedValueException
     */
    protected function parseData(): array
    {
        echo "Parsing JSON data\n";

        $content = stream_get_contents($this->fileHandle);

        /** @var array{records: array<int, array<string, string>>} $decoded */
        $decoded = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

        $result = [];
        foreach ($decoded['records'] as $item) {
            $result[] = new DataRecord($item);
        }

        return $result;
    }

    /**
     * @param DataRecord[] $records
     * @return void
     * @throws \UnexpectedValueException
     */
    protected function validateData(array $records): void
    {
        echo "Validating JSON structure\n";

        if (empty($records)) {
            throw new \UnexpectedValueException("Missing records key in JSON");
        }
    }

    /**
     * @param DataRecord[] $records
     * @return DataRecord[]
     */
    protected function transformData(array $records): array
    {
        echo "Transforming JSON data\n";

        $transformed = [];
        foreach ($records as $record) {
            $fields = [];
            foreach ($record->fields as $key => $value) {
                $fields[$key] = trim((string) $value);
            }
            $transformed[] = new DataRecord($fields);
        }

        return $transformed;
    }
}
