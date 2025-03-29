<?php

namespace Domain\Category\ValueObject;

readonly class CategoryMeta
{
    public function __construct(
        public ?string $title,
        public ?string $image,
        public bool    $status,
    ) {
    }


    public static function fromArray(array $data): self
    {
        return new self(
            $data['title'] ?? null,
            $data['image'] ?? null,
            $data['status'] ?? null,
        );
    }
}