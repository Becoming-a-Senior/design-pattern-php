<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\Strategy\Sorting\Strategy;

class BubbleSort implements SortingStrategy
{
    /**
     * @param array<int, int> $data
     * @return array<int, int>
     */
    public function sort(array $data): array
    {
        echo "Sorting using Bubble Sort\n";
        return $data;
    }

    /**
     * @param array<int, int> $data
     * @return bool
     */
    public function validate(array $data): bool
    {
        return count($data) > 1;
    }

    public function getComplexity(): string
    {
        return "Average: O(n²) | Worst case: O(n²)\n";
    }
}
