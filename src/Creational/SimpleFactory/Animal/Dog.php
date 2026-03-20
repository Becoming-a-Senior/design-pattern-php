<?php

declare(strict_types=1);

namespace DesignPattern\Creational\SimpleFactory\Animal;

class Dog implements Animal
{
    public function speak(): string
    {
        return 'woof';
    }
}
