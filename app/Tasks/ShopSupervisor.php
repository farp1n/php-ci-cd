<?php

declare(strict_types=1);

namespace App\Tasks;

class ShopSupervisor extends Laborer
{
    public function __construct(
        int $id,
        string $name,
        float $baseSalary,
        private float $shopBonus,
    ) {
        parent::__construct($id, $name, $baseSalary);
    }

    public function calculateSalary(): float
    {
        return parent::calculateSalary() + $this->shopBonus;
    }
}
