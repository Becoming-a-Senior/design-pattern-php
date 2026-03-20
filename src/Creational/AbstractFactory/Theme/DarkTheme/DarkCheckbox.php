<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Theme\DarkTheme;

use DesignPattern\Creational\AbstractFactory\Theme\Button;
use DesignPattern\Creational\AbstractFactory\Theme\Checkbox;

class DarkCheckbox implements Checkbox
{
    public function render(): string
    {
        return "Rendering a DARK themed checkbox.";
    }

    public function interactWithButton(Button $button): string
    {
        return "Dark checkbox interacting with: " . $button->render();
    }
}
