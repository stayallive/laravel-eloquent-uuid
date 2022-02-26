<?php

namespace Tests;

use Orchestra\Testbench\TestCase as LaravelTestCase;
use Stayallive\Laravel\Eloquent\UUID\ServiceProvider;

class TestCase extends LaravelTestCase
{
    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }
}
