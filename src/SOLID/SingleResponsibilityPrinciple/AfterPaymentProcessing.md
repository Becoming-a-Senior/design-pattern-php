### After: Applying the Single Responsibility Principle

```php
<?php

final class PaymentProcessor
{
    public function process(float $amount): void
    {
        // Process payment
    }
}

final class CardValidator
{
    public function validate(string $cardNumber): bool
    {
        // Validate card
        return true;
    }
}

final class ReceiptGenerator
{
    public function generate(): void
    {
        // Generate receipt
    }
}

final class ReceiptMailer
{
    public function send(): void
    {
        // Send receipt email
    }
}
```