<?php

declare(strict_types=1);

namespace Tests\Creational\AbstractFactory\Notification;

use DesignPattern\Creational\AbstractFactory\Notification\EmailProvider\EmailFormatter;
use DesignPattern\Creational\AbstractFactory\Notification\SmsProvider\SmsFormatter;
use DesignPattern\Creational\AbstractFactory\Notification\NotificationFactory\EmailNotificationFactory;
use DesignPattern\Creational\AbstractFactory\Notification\NotificationFactory\SmsNotificationFactory;
use DesignPattern\Creational\AbstractFactory\Notification\NotificationFactory\NotificationFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(NotificationFactory::class)]
class NotificationTest extends TestCase
{
    /**
     * @return array<int, mixed>
     */
    public static function notificationFactoryProvider(): array
    {
        return [
            [new EmailNotificationFactory()],
            [new SmsNotificationFactory()],
        ];
    }

    public function testEmailFormatter(): void
    {
        $formatter = new EmailFormatter();

        $data = [
            'subject' => 'Hello',
            'body' => 'World',
        ];

        $result = $formatter->format($data);

        self::assertSame("Subject: Hello\n\nWorld", $result);
    }

    public function testSmsFormatter(): void
    {
        $formatter = new SmsFormatter();

        $data = [
            'subject' => 'Hello',
            'body' => 'World',
        ];

        $result = $formatter->format($data);

        self::assertSame('Hello: World', $result);
    }

    #[DataProvider('notificationFactoryProvider')]
    public function testFormatter(NotificationFactory $factory): void
    {
        $formatter = $factory->createFormatter();

        $data = [
            'subject' => 'Order',
            'body' => 'Your order shipped',
        ];

        $result = $formatter->format($data);

        self::assertStringContainsString('Order', $result);
        self::assertStringContainsString('Your order shipped', $result);
    }

    #[DataProvider('notificationFactoryProvider')]
    public function testSender(NotificationFactory $factory): void
    {
        $sender = $factory->createSender();

        self::expectOutputRegex('/Sending (EMAIL|SMS) to/');

        $sender->send('user@example.com', 'Test message');
    }
}
