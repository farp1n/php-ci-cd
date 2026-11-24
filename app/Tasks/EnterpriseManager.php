<?php

declare(strict_types=1);

namespace App\Tasks;

class EnterpriseManager extends DepartmentHead
{
    public function __construct(
        int $id,
        string $name,
        float $baseSalary,
        float $shopBonus,
        float $departmentBonus,
        private float $enterpriseBonus,
    ) {
        parent::__construct($id, $name, $baseSalary, $shopBonus, $departmentBonus);
    }

    public function calculateSalary(): float
    {
        return parent::calculateSalary() + $this->enterpriseBonus;
    }
}
