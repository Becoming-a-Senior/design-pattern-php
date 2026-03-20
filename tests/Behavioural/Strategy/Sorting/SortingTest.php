<?php

declare(strict_types=1);

namespace Tests\Behavioural\Strategy\Sorting;

use DesignPattern\Behavioural\Strategy\Sorting\SortingContext;
use DesignPattern\Behavioural\Strategy\Sorting\Strategy\BubbleSort;
use DesignPattern\Behavioural\Strategy\Sorting\Strategy\QuickSort;
use DesignPattern\Behavioural\Strategy\Sorting\Strategy\MergeSort;
use DesignPattern\Behavioural\Strategy\Sorting\Strategy\SortingStrategy;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(SortingContext::class)]
class SortingTest extends TestCase
{
    /**
     * @param class-string<SortingStrategy> $strategyClass
     */
    #[DataProvider('strategyProvider')]
    public function testAllStrategies(string $strategyClass): void
    {
        $data    = [9, 1, 7, 3, 5];
        $context = new SortingContext(new $strategyClass());

        ob_start();
        $result = $context->applySort($data);
        ob_end_clean();

        self::assertSame($data, $result);
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function strategyProvider(): array
    {
        return [
            'QuickSort'  => [QuickSort::class],
            'BubbleSort' => [BubbleSort::class],
            'MergeSort'  => [MergeSort::class],
        ];
    }

    public function testQuickSortOutput(): void
    {
        $context = new SortingContext(new QuickSort());

        ob_start();
        $context->applySort([1, 2, 3]);
        $output = ob_get_clean();

        self::assertSame("Sorting using Quick Sort\n", $output);
    }

    public function testBubbleSortOutput(): void
    {
        $context = new SortingContext(new BubbleSort());

        ob_start();
        $context->applySort([1, 2, 3]);
        $output = ob_get_clean();

        self::assertSame("Sorting using Bubble Sort\n", $output);
    }

    public function testMergeSortOutput(): void
    {
        $context = new SortingContext(new MergeSort());

        ob_start();
        $context->applySort([1, 2, 3]);
        $output = ob_get_clean();

        self::assertSame("Sorting using Merge Sort\n", $output);
    }

    public function testQuickSortComplexity(): void
    {
        $context = new SortingContext(new QuickSort());
        self::assertSame("Average: O(n log n) | Worst case: O(n²)\n", $context->describeStrategy());
    }

    public function testBubbleSortComplexity(): void
    {
        $context = new SortingContext(new BubbleSort());
        self::assertSame("Average: O(n²) | Worst case: O(n²)\n", $context->describeStrategy());
    }

    public function testMergeSortComplexity(): void
    {
        $context = new SortingContext(new MergeSort());
        self::assertSame("Average: O(n log n) | Worst case: O(n log n)\n", $context->describeStrategy());
    }

    /**
     * @param class-string<SortingStrategy> $strategyClass
     */
    #[DataProvider('strategyProvider')]
    public function testValidationRejectsEmptyArray(string $strategyClass): void
    {
        $context = new SortingContext(new $strategyClass());

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Data failed strategy validation.');

        $context->applySort([]);
    }

    public function testSetStrategyChangesComplexityDescription(): void
    {
        $context = new SortingContext(new QuickSort());
        self::assertStringContainsString('O(n log n)', $context->describeStrategy());

        $context->setStrategy(new BubbleSort());
        self::assertStringContainsString('O(n²)', $context->describeStrategy());

        $context->setStrategy(new MergeSort());
        self::assertStringContainsString('O(n log n)', $context->describeStrategy());
    }

    public function testSetStrategyChangesOutputMessage(): void
    {
        $context = new SortingContext(new QuickSort());

        ob_start();
        $context->applySort([1, 2, 3]);
        self::assertSame("Sorting using Quick Sort\n", ob_get_clean());

        $context->setStrategy(new MergeSort());

        ob_start();
        $context->applySort([1, 2, 3]);
        self::assertSame("Sorting using Merge Sort\n", ob_get_clean());
    }
}
