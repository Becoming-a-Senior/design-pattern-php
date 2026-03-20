<?php

declare(strict_types=1);

namespace Tests\Creational\AbstractFactory\Theme;

use DesignPattern\Creational\AbstractFactory\Theme\ThemeFactory\ThemeFactory;
use DesignPattern\Creational\AbstractFactory\Theme\DarkTheme\DarkButton;
use DesignPattern\Creational\AbstractFactory\Theme\DarkTheme\DarkCheckbox;
use DesignPattern\Creational\AbstractFactory\Theme\ThemeFactory\DarkThemeFactory;
use DesignPattern\Creational\AbstractFactory\Theme\ThemeFactory\LightThemeFactory;
use DesignPattern\Creational\AbstractFactory\Theme\LightTheme\LightButton;
use DesignPattern\Creational\AbstractFactory\Theme\LightTheme\LightCheckbox;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(ThemeFactory::class)]
class ThemeTest extends TestCase
{
    /**
     * @return array<int, array{0: ThemeFactory}>
     */
    public static function themeFactoryProvider(): array
    {
        return [
            [new LightThemeFactory()],
            [new DarkThemeFactory()],
        ];
    }

    public function testLightButton(): void
    {
        $button = new LightButton();

        self::assertSame(
            'Rendering a LIGHT themed button.',
            $button->render()
        );
    }

    public function testDarkButton(): void
    {
        $button = new DarkButton();

        self::assertSame(
            'Rendering a DARK themed button.',
            $button->render()
        );
    }

    public function testLightCheckbox(): void
    {
        $checkbox = new LightCheckbox();

        self::assertSame(
            'Rendering a LIGHT themed checkbox.',
            $checkbox->render()
        );
    }

    public function testDarkCheckbox(): void
    {
        $checkbox = new DarkCheckbox();

        self::assertSame(
            'Rendering a DARK themed checkbox.',
            $checkbox->render()
        );
    }

    #[DataProvider('themeFactoryProvider')]
    public function testButton(ThemeFactory $factory): void
    {
        $button = $factory->createButton();

        $result = $button->render();

        self::assertStringContainsString('button', $result);
    }

    #[DataProvider('themeFactoryProvider')]
    public function testCheckbox(ThemeFactory $factory): void
    {
        $checkbox = $factory->createCheckbox();

        $result = $checkbox->render();

        self::assertStringContainsString('checkbox', $result);
    }

    #[DataProvider('themeFactoryProvider')]
    public function testThemeConsistency(ThemeFactory $factory): void
    {
        $button = $factory->createButton();
        $checkbox = $factory->createCheckbox();

        $buttonRender = $button->render();
        $checkboxRender = $checkbox->render();

        if (str_contains($buttonRender, 'LIGHT')) {
            self::assertStringContainsString('LIGHT', $checkboxRender);
        }

        if (str_contains($buttonRender, 'DARK')) {
            self::assertStringContainsString('DARK', $checkboxRender);
        }
    }
}
