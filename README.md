# Laravel Eloquent UUID

[![Latest Version](https://img.shields.io/github/release/stayallive/laravel-eloquent-uuid.svg?style=flat-square)](https://github.com/stayallive/laravel-eloquent-uuid/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/github/actions/workflow/status/stayallive/laravel-eloquent-uuid/ci.yaml?branch=master&style=flat-square)](https://github.com/stayallive/laravel-inverse-relations/actions/workflows/ci.yaml)
[![Total Downloads](https://img.shields.io/packagist/dt/stayallive/laravel-eloquent-uuid.svg?style=flat-square)](https://packagist.org/packages/stayallive/laravel-eloquent-uuid)

Generate UUID for a Laravel Eloquent model attribute.

> **Note**
> This package still works great, however since Laravel 10 this package is no longer needed as Laravel now has a built-in UUID/ULID traits that work much the same as this package. Read more about UUID/ULID in the [Laravel documentation](https://laravel.com/docs/10.x/eloquent#uuid-and-ulid-keys).

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
