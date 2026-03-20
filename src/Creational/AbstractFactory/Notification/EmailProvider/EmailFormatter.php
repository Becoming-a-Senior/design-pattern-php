<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Notification\EmailProvider;

use DesignPattern\Creational\AbstractFactory\Notification\MessageFormatter;

class EmailFormatter implements MessageFormatter
{
    /**
     * @param array<string, string> $data
     */
    public function format(array $data): string
    {
        return "Subject: {$data['subject']}\n\n{$data['body']}";
    }
}
