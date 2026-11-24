<?php

declare(strict_types=1);

namespace App\Tasks;

class Artist
{
    public function __construct(
        private int $id,
        private string $name,
        private bool $isBand,
        private int $startYear,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isBand(): bool
    {
        return $this->isBand;
    }

    public function getStartYear(): int
    {
        return $this->startYear;
    }

    public function getDetails(): string
    {
        return sprintf(
            '%s (ID: %d, %s, з %d)',
            $this->name,
            $this->id,
            $this->isBand ? 'гурт' : 'виконавець',
            $this->startYear,
        );
    }
}
