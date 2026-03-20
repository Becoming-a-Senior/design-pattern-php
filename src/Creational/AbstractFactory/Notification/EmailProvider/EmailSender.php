<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Notification\EmailProvider;

use DesignPattern\Creational\AbstractFactory\Notification\MessageSender;

class EmailSender implements MessageSender
{
    /**
     * @param string $recipient
     * @param string $message
     * @return void
     */
    public function send(string $recipient, string $message): void
    {
        echo "Sending EMAIL to {$recipient}\n";
        echo $message . "\n";
    }
}
