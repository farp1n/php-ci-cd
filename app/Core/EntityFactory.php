<?php

declare(strict_types=1);

namespace App\Core;

use App\Models\AbstractEntity;
use App\Models\ContentItem;
use App\Models\Subscriber;
use InvalidArgumentException;

class EntityFactory
{
    /**
     * @param  array<string, mixed>  $data
     */
    public static function createEntity(string $type, array $data): AbstractEntity
    {
        return match ($type) {
            'content' => new ContentItem(
                id: $data['id'],
                createdAt: $data['createdAt'],
                title: $data['title'],
                category: $data['category'],
                isPublished: $data['isPublished'],
                viewsCount: $data['viewsCount'],
            ),
            'subscriber' => new Subscriber(
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
