<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\Strategy\Sorting\Strategy;

class MergeSort implements SortingStrategy
{
    /**
     * @param array<int, int> $data
     * @return array<int, int>
     */
    public function sort(array $data): array
    {
        echo "Sorting using Merge Sort\n";
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
        return "Average: O(n log n) | Worst case: O(n log n)\n";
    }
}
