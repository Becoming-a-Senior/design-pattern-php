<?php

declare(strict_types=1);

namespace DesignPattern\Creational\SimpleFactory\Payment;

interface PaymentMethod
{
    public function pay(float $amount): string;
}
