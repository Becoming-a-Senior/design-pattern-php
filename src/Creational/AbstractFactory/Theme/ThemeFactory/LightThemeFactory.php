<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Theme\ThemeFactory;

use DesignPattern\Creational\AbstractFactory\Theme\Button;
use DesignPattern\Creational\AbstractFactory\Theme\Checkbox;
use DesignPattern\Creational\AbstractFactory\Theme\LightTheme\LightButton;
use DesignPattern\Creational\AbstractFactory\Theme\LightTheme\LightCheckbox;

class LightThemeFactory implements ThemeFactory
{
    public function createButton(): Button
    {
        return new LightButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new LightCheckbox();
    }
}
