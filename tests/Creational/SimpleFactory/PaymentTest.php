<?php

declare(strict_types=1);

namespace Tests\Creational\SimpleFactory;

use DesignPattern\Creational\SimpleFactory\Payment\PaymentFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PaymentFactory::class)]
class PaymentTest extends TestCase
{
    /**
     * @return void
     * @throws \InvalidArgumentException
     */
    public function testFactoryMethod(): void
    {
        $paymentMethod = new PaymentFactory();
        $paypal = $paymentMethod->create('paypal');
        $stripe = $paymentMethod->create('stripe');

        self::assertSame('Paid 100 via PayPal', $paypal->pay(100));
        self::assertSame('Paid 50 via Stripe', $stripe->pay(50));
    }
}
