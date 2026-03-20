<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\TemplateMethod\Pizza;

class SalamiPizza extends Pizza
{
    protected function addTopping(): string
    {
        return "add Salami";
    }
}
