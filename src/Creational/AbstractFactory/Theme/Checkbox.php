<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Theme;

interface Checkbox
{
    public function render(): string;

    public function interactWithButton(Button $button): string;
}
