## Payment Processing

### Before: One class handling multiple responsibilities

```php
<?php

class Payment
{
    public function process(float $amount): void
    {
        // Process payment
    }

    public function validateCard(string $cardNumber): bool
    {
        // Validate card
        return true;
    }

    public function generateReceipt(): void
    {
        // Generate receipt
    }

    public function sendReceiptEmail(): void
    {
        // Send receipt via email
    }
}
```
