<?php

declare(strict_types=1);

namespace Infrastructure\Category\Service;

use Application\Category\Service\MetaScrapperServiceInterface;
use Domain\Category\ValueObject\CategoryMeta;
use Embed\Embed;

/**
 * class MetaScrapperService
 */
final class MetaScrapperService implements MetaScrapperServiceInterface
{
    public function getCategory(string $title): ?CategoryMeta
    {
        try {
            $meta = (new Embed())->get($title);
            return CategoryMeta::fromArray([
                'title' => $meta->title,
                'image' => $meta->description,
                'status' => $meta->status,
            ]);
        } catch (\Throwable $e) {
            return null;
        }
    }
}