<?php

declare(strict_types=1);

namespace Tests\Behavioural\TemplateMethod\DataProcessor;

use DesignPattern\Behavioural\TemplateMethod\DataProcessor\CSVDataProcessor;
use DesignPattern\Behavioural\TemplateMethod\DataProcessor\DataProcessor;
use DesignPattern\Behavioural\TemplateMethod\DataProcessor\JSONDataProcessor;
use DesignPattern\Behavioural\TemplateMethod\DataProcessor\XMLDataProcessor;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

#[CoversClass(DataProcessor::class)]
class DataProcessorTest extends TestCase
{
    /**
     * @param string $file
     * @param array<int, array{name: string, age: int}> $records
     * @return void
     */
    private function createCsv(string $file, array $records): void
    {
        $fp = fopen($file, 'w');

        if ($fp === false) {
            throw new \RuntimeException("Unable to open file: $file");
        }

        fputcsv($fp, array_keys($records[0]), ',', '"', '');

        foreach ($records as $record) {
            fputcsv($fp, $record, ',', '"', '');
        }

        fclose($fp);
    }

    /**
     * @param string $file
     * @param array<int, array{name: string, age: int}> $records
     * @return void
     */
    private function createXml(string $file, array $records): void
    {
        $xml = new SimpleXMLElement('<records/>');

        foreach ($records as $recordData) {
            $record = $xml->addChild('record');

            foreach ($recordData as $key => $value) {
                $record->addChild($key, (string) $value);
            }
        }

        $xml->asXML($file);
    }

    /**
     * @param string $file
     * @param array<int, array{name: string, age: int}> $records
     * @return void
     */
    private function createJson(string $file, array $records): void
    {
        file_put_contents(
            $file,
            json_encode(['records' => $records], JSON_PRETTY_PRINT)
        );
    }

    /**
     * @return array<string, array{
     *     class-string,
     *     string,
     *     string,
     *     array<int, array{name: string, age: int}>,
     *     int
     * }>
     */
    public static function processorProvider(): array
    {
        return [
            'csv::2' => [CSVDataProcessor::class, 'csv', 'CSV', [
                ['name' => 'John', 'age' => 30],
                ['name' => 'Jane', 'age' => 25],
            ],
                3
            ],
            'csv::3' => [CSVDataProcessor::class, 'csv', 'CSV', [
                ['name' => 'John', 'age' => 30],
                ['name' => 'Jane', 'age' => 25],
                ['name' => 'Doe', 'age' => 35],
            ],
                4
            ],
            'json::2' => [JSONDataProcessor::class, 'json', 'JSON', [
                ['name' => 'John', 'age' => 30],
                ['name' => 'Jane', 'age' => 25],
            ],
                2
            ],
            'json::3' => [JSONDataProcessor::class, 'json', 'JSON', [
                ['name' => 'John', 'age' => 30],
                ['name' => 'Jane', 'age' => 25],
                ['name' => 'Doe', 'age' => 35],
            ],
                3
            ],
            'xml::2' => [XMLDataProcessor::class, 'xml', 'XML', [
                ['name' => 'John', 'age' => 30],
                ['name' => 'Jane', 'age' => 25],
            ],
                2
            ],
            'xml::3' => [XMLDataProcessor::class, 'xml', 'XML', [
                ['name' => 'John', 'age' => 30],
                ['name' => 'Jane', 'age' => 25],
                ['name' => 'Doe', 'age' => 35],
            ],
                3
            ],
        ];
    }

    /**
     * @param string $processorClass
     * @param string $extension
     * @param string $label
     * @param array<int, array{name: string, age: int}> $records
     * @param int $expectedRecords
     * @return void
     */
    #[DataProvider('processorProvider')]
    public function testProcessing(
        string $processorClass,
        string $extension,
        string $label,
        array $records,
        int $expectedRecords
    ): void {
        $file = sys_get_temp_dir() . "/test.$extension";

        match ($extension) {
            'csv'  => $this->createCsv($file, $records),
            'json' => $this->createJson($file, $records),
            'xml'  => $this->createXml($file, $records),
            default => throw new \RuntimeException("Unsupported extension: $extension"),
        };

        $processor = new $processorClass($file);

        $this->expectOutputString(
            "Opening file: {$file}\n" .
            "Parsing {$label} data\n" .
            "Validating {$label} structure\n" .
            "Transforming {$label} data\n" .
            "Saving {$expectedRecords} records\n" .
            "File closed\n"
        );

        /** @var DataProcessor $processor */
        $processor->process();

        unlink($file);
    }
}
