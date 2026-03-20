<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod\Parser\ParserFactory;

use DesignPattern\Creational\FactoryMethod\Parser\Parser;

interface ParserFactory
{
    /**
     * @return Parser
     */
    public function createParser(): Parser;
}
