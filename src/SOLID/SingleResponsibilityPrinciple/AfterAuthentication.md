### After: Applying the Single Responsibility Principle

```php
<?php

final class AuthService
{
    public function login(string $username, string $password): bool
    {
        // Check credentials
        return true;
    }

    public function logout(): void
    {
        // Destroy session
    }
}

final class PasswordHasher
{
    public function hash(string $password): string
    {
        // Hash password
        return '';
    }
}

final class TokenGenerator
{
    public function generate(): string
    {
        // Generate auth token
        return '';
    }
}
```
