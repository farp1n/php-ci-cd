<?php

declare(strict_types=1);

namespace App\Tasks;

class DepartmentHead extends ShopSupervisor
{
    public function __construct(
        int $id,
        string $name,
        float $baseSalary,
        float $shopBonus,
        private float $departmentBonus,
    ) {
        parent::__construct($id, $name, $baseSalary, $shopBonus);
    }

    public function calculateSalary(): float
    {
        return parent::calculateSalary() + $this->departmentBonus;
    }
}
