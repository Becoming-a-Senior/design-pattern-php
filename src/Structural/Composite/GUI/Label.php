<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Composite\GUI;

class Label implements GUIComponent
{
    public function __construct(
        private readonly string $text,
        private int $x = 0,
        private int $y = 0
    ) {
    }

    public function render(): string
    {
        return "Rendering Label: '{$this->text}' at ({$this->x}, {$this->y})\n";
    }

    public function move(int $x, int $y): string
    {
        $this->x = $x;
        $this->y = $y;
        return "Moved Label: '{$this->text}' to ({$this->x}, {$this->y})\n";
    }
}
