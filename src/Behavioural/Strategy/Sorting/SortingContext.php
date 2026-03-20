<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\Strategy\Sorting;

use DesignPattern\Behavioural\Strategy\Sorting\Strategy\SortingStrategy;

class SortingContext
{
    /**
     * @param SortingStrategy $strategy
     */
    public function __construct(
        private SortingStrategy $strategy,
    ) {
    }

    /**
     * @param array<int, int> $elements
     * @return array<int, int>
     */
    public function applySort(array $elements): array
    {
        if (!$this->strategy->validate($elements)) {
            throw new \InvalidArgumentException("Data failed strategy validation.");
        }
        return $this->strategy->sort($elements);
    }

    /**
     * @return string
     */
    public function describeStrategy(): string
    {
        return $this->strategy->getComplexity();
    }

    /**
     * @param SortingStrategy $strategy
     * @return void
     */
    public function setStrategy(SortingStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }
}
