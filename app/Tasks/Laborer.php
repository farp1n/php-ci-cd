<?php

declare(strict_types=1);

namespace App\Tasks;

class Laborer extends Employee
{
    public function calculateSalary(): float
    {
        return $this->baseSalary;
    }
}
