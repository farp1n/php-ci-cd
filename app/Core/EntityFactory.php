<?php

declare(strict_types=1);

namespace App\Core;

use App\Models\AbstractEntity;
use App\Models\Scooter;
use App\Models\User;
use InvalidArgumentException;

class EntityFactory
{
    /**
     * @param  array<string, mixed>  $data
     */
    public static function createEntity(string $type, array $data): AbstractEntity
    {
        return match ($type) {
            'scooter' => new Scooter(
                id: $data['id'],
                createdAt: $data['createdAt'],
                model: $data['model'],
                ratePerMin: $data['ratePerMin'],
                available: $data['available'],
                batteryLevel: $data['batteryLevel'],
            ),
            'user' => new User(
                id: $data['id'],
                createdAt: $data['createdAt'],
                name: $data['name'],
                phone: $data['phone'],
                balance: $data['balance'],
            ),
            default => throw new InvalidArgumentException("Невідомий тип сутності: {$type}"),
        };
    }
}
