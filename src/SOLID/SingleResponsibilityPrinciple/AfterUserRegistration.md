### After: Applying the Single Responsibility Principle


```php
<?php

final class User
{
    public function __construct(
        public readonly string $name,
        public readonly string $email
    ) {}
}

final class UserRepository
{
    public function save(User $user): void
    {
        // Persist user
    }

    public function update(User $user): void
    {
        // Update user
    }

    public function delete(User $user): void
    {
        // Remove user
    }
}

final class UserMailer
{
    public function sendWelcomeEmail(User $user): void
    {
        // Send welcome email
    }
}
```