<?php

declare(strict_types=1);

namespace App\Tasks;

class Genre
{
    /** @var Artist[] */
    private array $artists = [];

    public function __construct(
        private int $genreId,
        private string $name,
    ) {}

    public function getGenreId(): int
    {
        return $this->genreId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addArtist(Artist $artist): void
    {
        foreach ($this->artists as $existing) {
            if ($existing->getId() === $artist->getId()) {
                return;
            }
        }
        $this->artists[] = $artist;
    }

    public function removeArtist(int $id): bool
    {
        foreach ($this->artists as $index => $artist) {
            if ($artist->getId() === $id) {
                unset($this->artists[$index]);
                $this->artists = array_values($this->artists);

                return true;
            }
        }

        return false;
    }

    public function findArtist(int $id): ?Artist
    {
        foreach ($this->artists as $artist) {
            if ($artist->getId() === $id) {
                return $artist;
            }
        }

        return null;
    }

    /**
     * @return Artist[]
     */
    public function getArtists(): array
    {
        return $this->artists;
    }
}
