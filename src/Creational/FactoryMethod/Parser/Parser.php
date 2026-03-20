<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod\Parser;

interface Parser
{
    /**
     * @param string $data
     * @return array<mixed>
     */
    public function parse(string $data): array;
}
