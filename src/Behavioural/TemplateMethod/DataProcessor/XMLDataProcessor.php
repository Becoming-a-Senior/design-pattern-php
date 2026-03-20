<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\TemplateMethod\DataProcessor;

class XMLDataProcessor extends DataProcessor
{
    /**
     * @return DataRecord[]
     * @throws \JsonException
     */
    protected function parseData(): array
    {
        echo "Parsing XML data\n";

        $content = stream_get_contents($this->fileHandle);
        /** @var \SimpleXMLElement $xml */
        $xml = simplexml_load_string($content);

        $records = [];
        foreach ($xml->record as $record) {
            $fields = [];
            foreach ($record as $key => $value) {
                $fields[$key] = (string) $value;
            }
            $records[] = new DataRecord($fields);
        }

        return $records;
    }

    /**
     * @param DataRecord[] $records
     * @return void
     * @throws \UnexpectedValueException
     */
    protected function validateData(array $records): void
    {
        echo "Validating XML structure\n";

        if (empty($records)) {
            throw new \UnexpectedValueException("XML file contains no data");
        }
    }

    /**
     * @param DataRecord[] $records
     * @return DataRecord[]
     */
    protected function transformData(array $records): array
    {
        echo "Transforming XML data\n";

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
