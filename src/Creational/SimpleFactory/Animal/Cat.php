<?php

declare(strict_types=1);

namespace DesignPattern\Creational\SimpleFactory\Animal;

class Cat implements Animal
{
    public function speak(): string
    {
        return 'miau';
    }
}
