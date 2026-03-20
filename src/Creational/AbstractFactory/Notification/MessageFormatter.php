<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Notification;

interface MessageFormatter
{
    /**
     * @param array<string, mixed> $data
     */
    public function format(array $data): string;
}
