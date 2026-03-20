<?php

declare(strict_types=1);

namespace Tests\Behavioural\TemplateMethod\Pizza;

use DesignPattern\Behavioural\TemplateMethod\Pizza\CheesyStuffedPizza;
use DesignPattern\Behavioural\TemplateMethod\Pizza\SalamiPizza;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SalamiPizza::class)]
class PizzaTest extends TestCase
{
    public function testPizzaSalami(): void
    {
        $salamiPizza = new SalamiPizza();
        $salamiPizza->makePizza();

        self::assertSame(
            [
                'prepare Dough',
                'add Sauce',
                'add Cheese',
                'add Salami',
                'bake Pizza',
                'cut Pizza'
            ],
            $salamiPizza->getSteps()
        );
    }

    public function testPizzaCheesyStuffed(): void
    {
        $cheesyPizza = new CheesyStuffedPizza();
        $cheesyPizza->makePizza();

        self::assertSame(
            [
                'prepare stuffed dough',
                'add Sauce',
                'add extra cheese',
                'add Pepperoni',
                'bake Pizza slowly for extra cheesiness',
                'cut Pizza'
            ],
            $cheesyPizza->getSteps()
        );
    }
}
