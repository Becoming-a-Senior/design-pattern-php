<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Composite\GUI;

class Panel implements GUIComponent
{
    /**
     * @var array<int, GUIComponent> $children
     */
    private array $children = [];
    private int $x = 0;
    private int $y = 0;

    /**
     * @param GUIComponent $child
     * @return void
     */
    public function addChild(GUIComponent $child): void
    {
        $this->children[] = $child;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $result =  "Rendering Panel at ({$this->x}, {$this->y})\n";
        foreach ($this->children as $child) {
            $result .= $child->render();
        }
        return $result;
    }

    /**
     * @param int $x
     * @param int $y
     * @return string
     */
    public function move(int $x, int $y): string
    {
        $dx = $x - $this->x;
        $dy = $y - $this->y;
        $this->x = $x;
        $this->y = $y;
        $result = "Moved Panel to ({$this->x}, {$this->y})\n";

        foreach ($this->children as $child) {
            $child->move($dx, $dy);
        }
        return $result;
    }
}
