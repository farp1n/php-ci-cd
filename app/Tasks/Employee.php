<?php

declare(strict_types=1);

namespace App\Tasks;

abstract class Employee
{
    public function __construct(
        protected int $id,
        protected string $name,
        protected float $baseSalary,
    ) {}

    abstract public function calculateSalary(): float;

    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): string
    {
        return static::class;
    }
}
