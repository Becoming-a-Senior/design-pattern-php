<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Composite\GUI;

class Button implements GUIComponent
{
    public function __construct(
        private readonly string $name,
        private int $x = 0,
        private int $y = 0
    ) {
    }

    public function render(): string
    {
        return "Rendering Button: {$this->name} at ({$this->x}, {$this->y})\n";
    }

    public function move(int $x, int $y): string
    {
        $this->x = $x;
        $this->y = $y;
        return "Moved Button: {$this->name} to ({$this->x}, {$this->y})\n";
    }
}
