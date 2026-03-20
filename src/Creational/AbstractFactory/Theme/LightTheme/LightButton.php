<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Theme\LightTheme;

use DesignPattern\Creational\AbstractFactory\Theme\Button;

class LightButton implements Button
{
    public function render(): string
    {
        return "Rendering a LIGHT themed button.";
    }
}
