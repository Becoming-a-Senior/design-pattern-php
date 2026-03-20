<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\TemplateMethod\DataProcessor;

/**
 * Value Object representing a single parsed data record.
 *
 * Immutable container for field data passed through the processing
 */
class DataRecord
{
    /**
     * @param list<string|null>|array<string, string> $fields
     */
    public function __construct(
        public readonly array $fields
    ) {
    }
}
