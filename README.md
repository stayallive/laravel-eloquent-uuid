# Laravel Eloquent UUID

Generate UUID for a Laravel Eloquent model attribute.

## Installation

```bash
composer require stayallive/laravel-eloquent-uuid
```

## Usage

Adding the `UsesUUID` trait will ensure that the key attribute will be filled with a UUID.

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stayallive\Laravel\Eloquent\UUID\UsesUUID;

class SomeModel extends Model
{
    use UsesUUID;

    /**
     * This method is not needed but can be used to override which attribute is filled with the UUID.
     */
    public function getUUIDAttributeName(): string
    {
        return $this->getKeyName();
    }
}
```

## Security Vulnerabilities

If you discover a security vulnerability within this package, please send an e-mail to Alex Bouma at `alex+security@bouma.me`. All security vulnerabilities will be swiftly addressed.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
