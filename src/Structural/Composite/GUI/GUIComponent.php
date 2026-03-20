<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Composite\GUI;

interface GUIComponent
{
    public function render(): string;
    public function move(int $x, int $y): string;
}
