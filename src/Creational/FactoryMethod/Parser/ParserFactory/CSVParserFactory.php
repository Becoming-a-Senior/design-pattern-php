<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod\Parser\ParserFactory;

use DesignPattern\Creational\FactoryMethod\Parser\CSVParser;
use DesignPattern\Creational\FactoryMethod\Parser\Parser;

class CSVParserFactory implements ParserFactory
{
    /**
     * @return Parser
     */
    public function createParser(): Parser
    {
        return new CSVParser();
    }
}
