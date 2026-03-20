<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Notification\NotificationFactory;

use DesignPattern\Creational\AbstractFactory\Notification\MessageFormatter;
use DesignPattern\Creational\AbstractFactory\Notification\MessageSender;
use DesignPattern\Creational\AbstractFactory\Notification\EmailProvider\EmailFormatter;
use DesignPattern\Creational\AbstractFactory\Notification\EmailProvider\EmailSender;

class EmailNotificationFactory implements NotificationFactory
{
    public function createFormatter(): MessageFormatter
    {
        return new EmailFormatter();
    }

    public function createSender(): MessageSender
    {
        return new EmailSender();
    }
}
