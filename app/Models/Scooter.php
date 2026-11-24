<?php

declare(strict_types=1);

namespace App\Models;

use App\Interfaces\ExportableInterface;
use App\Traits\JsonExportTrait;

class Scooter extends AbstractEntity implements ExportableInterface
{
    use JsonExportTrait;

    public function __construct(
        string $id,
        string $createdAt,
        private string $model,
        private float $ratePerMin,
        private bool $available,
        private int $batteryLevel,
    ) {
        parent::__construct($id, $createdAt);
    }

    public function getDetails(): string
    {
        return sprintf(
            'Самокат "%s" (ID: %s), тариф %.2f грн/хв, батарея %d%%, доступний: %s',
            $this->model,
            $this->id,
            $this->ratePerMin,
            $this->batteryLevel,
            $this->available ? 'так' : 'ні',
        );
    }
}
