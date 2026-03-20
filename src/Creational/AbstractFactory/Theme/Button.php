<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Theme;

interface Button
{
    public function render(): string;
}
