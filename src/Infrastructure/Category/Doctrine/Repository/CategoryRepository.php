<?php

declare(strict_types=1);

namespace Infrastructure\Category\Doctrine\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Domain\Category\Entity\Category;
use Domain\Category\Repository\CategoryRepositoryInterface;
use Infrastructure\Shared\Doctrine\Repository\AbstractRepository;

/**
 * class CategoryRepository
 */
final class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function isUniqueTitle(string $title): string
    {
        return $title;
    }
}