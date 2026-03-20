<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Notification\NotificationFactory;

use DesignPattern\Creational\AbstractFactory\Notification\MessageFormatter;
use DesignPattern\Creational\AbstractFactory\Notification\MessageSender;
use DesignPattern\Creational\AbstractFactory\Notification\SmsProvider\SmsFormatter;
use DesignPattern\Creational\AbstractFactory\Notification\SmsProvider\SmsSender;

class SmsNotificationFactory implements NotificationFactory
{
    public function createFormatter(): MessageFormatter
    {
        return new SmsFormatter();
    }

    public function createSender(): MessageSender
    {
        return new SmsSender();
    }
}
