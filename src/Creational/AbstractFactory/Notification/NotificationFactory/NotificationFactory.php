<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Notification\NotificationFactory;

use DesignPattern\Creational\AbstractFactory\Notification\MessageFormatter;
use DesignPattern\Creational\AbstractFactory\Notification\MessageSender;

interface NotificationFactory
{
    public function createFormatter(): MessageFormatter;

    public function createSender(): MessageSender;
}
