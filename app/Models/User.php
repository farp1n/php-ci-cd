<?php

declare(strict_types=1);

namespace App\Models;

use App\Interfaces\ExportableInterface;
use App\Traits\JsonExportTrait;

class User extends AbstractEntity implements ExportableInterface
{
    use JsonExportTrait;

    public function __construct(
        string $id,
        string $createdAt,
        private string $name,
        private string $phone,
        private float $balance,
    ) {
        parent::__construct($id, $createdAt);
    }

    public function getDetails(): string
    {
        return sprintf(
            'Користувач %s (ID: %s), тел: %s, баланс: %.2f грн',
            $this->name,
            $this->id,
            $this->phone,
            $this->balance,
        );
    }
}
