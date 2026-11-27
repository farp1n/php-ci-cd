<?php

declare(strict_types=1);

namespace App\Models;

use App\Interfaces\ExportableInterface;
use App\Traits\JsonExportTrait;

class ContentItem extends AbstractEntity implements ExportableInterface
{
    use JsonExportTrait;

    public function __construct(
        string $id,
        string $createdAt,
        private string $title,
        private string $category,
        private bool $isPublished,
        private int $viewsCount,
    ) {
        parent::__construct($id, $createdAt);
    }

    public function getDetails(): string
    {
        return sprintf(
            'Контент-матеріал "%s" (ID: %s), категорія: %s, переглядів: %d, опублікований: %s',
            $this->title,
            $this->id,
            $this->category,
            $this->viewsCount,
            $this->isPublished ? 'так' : 'ні',
        );
    }
}
