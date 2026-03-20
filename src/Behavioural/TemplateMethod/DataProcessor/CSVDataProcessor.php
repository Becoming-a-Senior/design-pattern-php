<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\TemplateMethod\DataProcessor;

class CSVDataProcessor extends DataProcessor
{
    /**
     * @return DataRecord[]
     */
    protected function parseData(): array
    {
        echo "Parsing CSV data\n";

        $rows = [];
        // empty escape: required by PHPStan and avoids PHP 8.4 deprecation
        while (($row = fgetcsv($this->fileHandle, 1000, ',', '"', '')) !== false) {
            $rows[] = new DataRecord($row);
        }

        return $rows;
    }

    /**
     * @param DataRecord[] $records
     * @return void
     * @throws \UnexpectedValueException
     */
    protected function validateData(array $records): void
    {
        echo "Validating CSV structure\n";

        foreach ($records as $record) {
            if (count($record->fields) < 2) {
                throw new \UnexpectedValueException("Invalid CSV row");
            }
        }
    }

    /**
     * @param DataRecord[] $records
     * @return DataRecord[]
     */
    protected function transformData(array $records): array
    {
        echo "Transforming CSV data\n";

        $transformed = [];
        foreach ($records as $record) {
            $fields = [];
            foreach ($record->fields as $value) {
                $fields[] = trim((string) $value);
            }
            $transformed[] = new DataRecord($fields);
        }

        return $transformed;
    }
}
