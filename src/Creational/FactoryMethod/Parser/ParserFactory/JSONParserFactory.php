<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod\Parser\ParserFactory;

use DesignPattern\Creational\FactoryMethod\Parser\JSONParser;
use DesignPattern\Creational\FactoryMethod\Parser\Parser;

class JSONParserFactory implements ParserFactory
{
    /**
     * @return Parser
     */
    public function createParser(): Parser
    {
        return new JSONParser();
    }
}
