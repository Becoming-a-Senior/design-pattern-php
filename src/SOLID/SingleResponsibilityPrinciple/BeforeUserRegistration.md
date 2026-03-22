## Registration Flow

### Before: One class handling multiple responsibilities

```php
<?php

class User
{
    public function __construct(
        public string $name,
        public string $email
    ) {}

    public function save(): void
    {
        // Save user to database
    }

    public function update(): void
    {
        // Update user in database
    }

    public function delete(): void
    {
        // Delete user from database
    }

    public function sendWelcomeEmail(): void
    {
        // Send email to user
    }
}
```