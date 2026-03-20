<?php

declare(strict_types=1);

namespace Tests\Structural\Composite\GUI;

use DesignPattern\Structural\Composite\GUI\GUIComponent;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use DesignPattern\Structural\Composite\GUI\Panel;
use DesignPattern\Structural\Composite\GUI\Label;
use DesignPattern\Structural\Composite\GUI\Button;

#[CoversClass(GUIComponent::class)]
final class GUIComponentTest extends TestCase
{
    public function testRender(): void
    {
        $button1 = new Button('OK');
        $button2 = new Button('Cancel');
        $label = new Label('Username:');

        $panel = new Panel();
        $panel->addChild($label);
        $panel->addChild($button1);
        $panel->addChild($button2);

        $expected = "Rendering Panel at (0, 0)\n"
            . "Rendering Label: 'Username:' at (0, 0)\n"
            . "Rendering Button: OK at (0, 0)\n"
            . "Rendering Button: Cancel at (0, 0)\n";

        self::assertEquals($expected, $panel->render());
    }

    public function testMove(): void
    {
        $button = new Button('Submit');
        $label = new Label('Email:');

        $panel = new Panel();
        $panel->addChild($label);
        $panel->addChild($button);

        $expectedMove = "Moved Panel to (100, 50)\n";
        $result = $panel->move(100, 50);

        self::assertEquals($expectedMove, $result);

        $expectedRender = "Rendering Panel at (100, 50)\n"
            . "Rendering Label: 'Email:' at (100, 50)\n"
            . "Rendering Button: Submit at (100, 50)\n";
        self::assertEquals(
            $expectedRender,
            $panel->render()
        );
    }
}
