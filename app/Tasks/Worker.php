<?php

declare(strict_types=1);

namespace App\Tasks;

class Worker
{
    public function __construct(
        private readonly float $baseRate,
        private readonly float $piecePrice,
    ) {}

    /**
     * Зарплата = $Base + ($PCount * 0.05 * $PP)
     */
    public function calculateSalary(int $partsCount): float
    {
        return $this->baseRate + ($partsCount * 0.05 * $this->piecePrice);
    }
}
