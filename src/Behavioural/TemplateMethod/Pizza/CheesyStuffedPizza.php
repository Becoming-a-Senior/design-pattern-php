<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\TemplateMethod\Pizza;

class CheesyStuffedPizza extends Pizza
{
    protected function prepareDoug(): string
    {
        return "prepare stuffed dough";
    }

    protected function addCheese(): string
    {
        return "add extra cheese";
    }

    protected function addTopping(): string
    {
        return "add Pepperoni";
    }

    protected function bake(): string
    {
        return "bake Pizza slowly for extra cheesiness";
    }
}
