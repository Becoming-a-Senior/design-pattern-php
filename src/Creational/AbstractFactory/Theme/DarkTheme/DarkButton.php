<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Theme\DarkTheme;

use DesignPattern\Creational\AbstractFactory\Theme\Button;

class DarkButton implements Button
{
    public function render(): string
    {
        return "Rendering a DARK themed button.";
    }
}
