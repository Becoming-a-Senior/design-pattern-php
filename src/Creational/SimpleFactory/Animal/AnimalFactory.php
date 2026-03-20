<?php

declare(strict_types=1);

namespace DesignPattern\Creational\SimpleFactory\Animal;

class AnimalFactory
{
    /**
     * @param string $animal
     * @return Animal
     * @throws \InvalidArgumentException
     */
    public function create(string $animal): Animal
    {
        return match (strtolower($animal)) {
            'cat' => new Cat(),
            'dog' => new Dog(),
            default => throw new \InvalidArgumentException('Animal ' . $animal . ' not created'),
        };
    }
}
