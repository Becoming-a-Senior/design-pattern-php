<?php

declare(strict_types=1);

namespace DesignPattern\Creational\SimpleFactory\Payment;

class StripePayment implements PaymentMethod
{
    public function pay(float $amount): string
    {
        return "Paid $amount via Stripe";
    }
}
