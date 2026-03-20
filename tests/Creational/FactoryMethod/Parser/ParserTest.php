<?php

declare(strict_types=1);

namespace Tests\Creational\FactoryMethod\Parser;

use DesignPattern\Creational\FactoryMethod\Parser\CSVParser;
use DesignPattern\Creational\FactoryMethod\Parser\JSONParser;
use DesignPattern\Creational\FactoryMethod\Parser\XMLParser;
use DesignPattern\Creational\FactoryMethod\Parser\ParserFactory\ParserFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ParserFactory::class)]
class ParserTest extends TestCase
{
    public function testCSVParserParsesData(): void
    {
        $parser = new CSVParser();

        $data = "name,age\nJohn,30\nJane,25";

        $result = $parser->parse($data);

        self::assertCount(3, $result);
        self::assertSame(['name', 'age'], $result[0]);
        self::assertSame(['John', '30'], $result[1]);
        self::assertSame(['Jane', '25'], $result[2]);
    }

    /**
     * @throws \JsonException
     */
    public function testJSONParserParsesData(): void
    {
        $parser = new JSONParser();

        $data = '{"name":"John","age":30}';

        $result = $parser->parse($data);

        self::assertSame('John', $result['name']);
        self::assertSame(30, $result['age']);
    }

    public function testJSONParserThrowsOnInvalidData(): void
    {
        self::expectException(\JsonException::class);
        self::expectExceptionMessage('Syntax error');

        $parser = new JSONParser();
        $parser->parse('invalid json');
    }

    public function testXMLParserParsesData(): void
    {
        $parser = new XMLParser();

        $data = <<<XML
<records>
    <record>
        <name>John</name>
        <age>30</age>
    </record>
</records>
XML;

        $result = $parser->parse($data);

        self::assertSame('John', $result[0]['name'] ?? null);
        self::assertSame('30', $result[0]['age'] ?? null);
    }
}
