## Authentication

### Before: One class handling multiple responsibilities

```php
<?php

final class Auth
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

    public function hashPassword(string $password): string
    {
        // Hash password
        return '';
    }

    public function generateToken(): string
    {
        // Generate auth token
        return '';
    }
}
```
