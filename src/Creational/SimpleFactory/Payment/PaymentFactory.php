<?php

declare(strict_types=1);

namespace DesignPattern\Creational\SimpleFactory\Payment;

class PaymentFactory
{
    /**
     * @param string $payment
     * @return PaymentMethod
     * @throws \InvalidArgumentException
     */
    public function create(string $payment): PaymentMethod
    {
        return match (strtolower($payment)) {
            'paypal' => new PaypalPayment(),
            'stripe' => new StripePayment(),
            default => throw new \InvalidArgumentException('Payment Method not created'),
        };
    }
}
