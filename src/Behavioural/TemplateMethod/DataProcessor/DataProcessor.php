<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\TemplateMethod\DataProcessor;

abstract class DataProcessor
{
    protected string $filePath;
    /** @var resource */
    protected $fileHandle;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Template method defining the data processing algorithm.
     */
    final public function process(): void
    {
        $this->openFile();
        try {
            $records = $this->parseData();
            $this->validateData($records);
            $records = $this->transformData($records);
            $this->saveResults($records);
        } finally {
            $this->closeFile();
        }
    }

    protected function openFile(): void
    {
        echo "Opening file: {$this->filePath}\n";
        $file = fopen($this->filePath, 'r');
        if ($file === false) {
            throw new \RuntimeException('Unable to open file');
        }

        $this->fileHandle = $file;
    }

    /**
     * @return DataRecord[]
     */
    abstract protected function parseData(): array;

    /**
     * @param DataRecord[] $records
     * @return void
     */
    abstract protected function validateData(array $records): void;

    /**
     * @param DataRecord[] $records
     * @return DataRecord[]
     */
    protected function transformData(array $records): array
    {
        return $records;
    }

    /**
     * @param DataRecord[] $records
     * @return void
     */
    protected function saveResults(array $records): void
    {
        echo "Saving " . count($records) . " records\n";
    }

    protected function closeFile(): void
    {
        fclose($this->fileHandle);
        echo "File closed\n";
    }
}
