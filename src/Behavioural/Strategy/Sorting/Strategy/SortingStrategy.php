<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\Strategy\Sorting\Strategy;

interface SortingStrategy
{
    /**
     * @param array<int, int> $data
     * @return array<int, int>
     */
    public function sort(array $data): array;

    /**
     * @param array<int, int> $data
     * @return bool
     */
    public function validate(array $data): bool;

    /**
     * @return string
     */
    public function getComplexity(): string;
}
