<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Theme\ThemeFactory;

use DesignPattern\Creational\AbstractFactory\Theme\Button;
use DesignPattern\Creational\AbstractFactory\Theme\Checkbox;

interface ThemeFactory
{
    public function createButton(): Button;
    public function createCheckbox(): Checkbox;
}
