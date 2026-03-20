<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Notification;

interface MessageSender
{
    public function send(string $recipient, string $message): void;
}
