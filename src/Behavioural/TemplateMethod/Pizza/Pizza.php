<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\TemplateMethod\Pizza;

abstract class Pizza
{
    /**
     * @var array<int, string>
     */
    private array $recipeSteps = [];

    protected function prepareDoug(): string
    {
        return "prepare Dough";
    }

    protected function addTomatoSauce(): string
    {
        return "add Sauce";
    }

    protected function addCheese(): string
    {
        return "add Cheese";
    }

    abstract protected function addTopping(): string;

    protected function bake(): string
    {
        return "bake Pizza";
    }

    protected function cut(): string
    {
        return "cut Pizza";
    }

    /**
     * Template method defining the pizza-making algorithm.
     */
    final public function makePizza(): void
    {
        foreach ($this->getRecipeSteps() as $step) {
            $this->recipeSteps[] = $step;
        }
    }

    /**
     * @return array<int, string>
     */
    final public function getSteps(): array
    {
        return $this->recipeSteps;
    }

    /**
     * @return array<int, string>
     */
    protected function getRecipeSteps(): array
    {
        $steps = [
            $this->prepareDoug(),
            $this->addTomatoSauce(),
            $this->addCheese(),
            $this->addTopping(),
            $this->bake(),
            $this->cut(),
        ];

        return array_filter($steps);
    }
}
