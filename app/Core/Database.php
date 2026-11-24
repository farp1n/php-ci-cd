<?php

declare(strict_types=1);

namespace App\Core;

final class Database
{
    private static ?self $instance = null;

    private function __construct()
    {
        echo "Підключення до БД створено\n";
    }

    private function __clone() {}

    public function __wakeup(): void
    {
        throw new \LogicException('Cannot unserialize singleton');
    }

    public static function getInstance(): self
    {
        return self::$instance ??= new self;
    }
}
