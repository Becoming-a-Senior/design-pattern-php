<?php

declare(strict_types=1);

namespace Tests\Creational\SimpleFactory;

use DesignPattern\Creational\SimpleFactory\Animal\AnimalFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(AnimalFactory::class)]
class AnimalTest extends TestCase
{
    /**
     * @return void
     * @throws \InvalidArgumentException
     */
    public function testFactoryMethod(): void
    {
        $factory = new AnimalFactory();
        $cat = $factory->create('cat');
        $dog = $factory->create('dog');

        self::assertSame('miau', $cat->speak());
        self::assertSame('woof', $dog->speak());
    }
}
