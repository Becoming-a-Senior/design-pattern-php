<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Notification\SmsProvider;

use DesignPattern\Creational\AbstractFactory\Notification\MessageFormatter;

class SmsFormatter implements MessageFormatter
{
    /**
     * @param array<string, string> $data
     */
    public function format(array $data): string
    {
        return "{$data['subject']}: {$data['body']}";
    }
}
