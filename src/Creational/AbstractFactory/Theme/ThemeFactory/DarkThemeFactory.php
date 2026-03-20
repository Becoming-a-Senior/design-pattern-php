<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Theme\ThemeFactory;

use DesignPattern\Creational\AbstractFactory\Theme\Button;
use DesignPattern\Creational\AbstractFactory\Theme\Checkbox;
use DesignPattern\Creational\AbstractFactory\Theme\DarkTheme\DarkButton;
use DesignPattern\Creational\AbstractFactory\Theme\DarkTheme\DarkCheckbox;

class DarkThemeFactory implements ThemeFactory
{
    public function createButton(): Button
    {
        return new DarkButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new DarkCheckbox();
    }
}
