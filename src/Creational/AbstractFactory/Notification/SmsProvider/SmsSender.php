<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Notification\SmsProvider;

use DesignPattern\Creational\AbstractFactory\Notification\MessageSender;

class SmsSender implements MessageSender
{
    /**
     * @param string $recipient
     * @param string $message
     * @return void
     */
    public function send(string $recipient, string $message): void
    {
        echo "Sending SMS to {$recipient}\n";
        echo $message . "\n";
    }
}
