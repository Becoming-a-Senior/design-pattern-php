<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Theme\LightTheme;

use DesignPattern\Creational\AbstractFactory\Theme\Button;
use DesignPattern\Creational\AbstractFactory\Theme\Checkbox;

class LightCheckbox implements Checkbox
{
    public function render(): string
    {
        return "Rendering a LIGHT themed checkbox.";
    }

    public function interactWithButton(Button $button): string
    {
        return "Light checkbox interacting with: " . $button->render();
    }
}
