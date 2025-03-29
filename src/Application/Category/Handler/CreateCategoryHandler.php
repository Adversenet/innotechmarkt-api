<?php

namespace Application\Category\Handler;

use Application\Category\Command\CreateCategoryCommand;
use Application\Category\Service\MetaScrapperServiceInterface;
use Application\Shared\Mapper;
use Domain\Category\Entity\Category;
use Domain\Category\Exception\NonUniqueTitleException;
use Domain\Category\Repository\CategoryRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;


#[AsMessageHandler]
final readonly class CreateCategoryHandler
{
    /**
     * This is the constructor of the class.
     *
     * @param CategoryRepositoryInterface $repository
     * @param MetaScrapperServiceInterface $metaScrapperService
     */
    public function __construct(
        private CategoryRepositoryInterface      $repository,
        private MetaScrapperServiceInterface $metaScrapperService
    ) {
    }

    /**
     * This is the function that handles the command.
     *
     * @throws NonUniqueTitleException
     */
    public function __invoke(CreateCategoryCommand $command): void
    {
        if ($this->repository->isUniqueTitle($command->title)) {
            throw new NonUniqueTitleException();
        }

        if ($command->title === null) {
            $command->title = uniqid();
        }


        $link = Mapper::getHydratedObject($command, new Category());
        $link->setMeta(
            $this->metaScrapperService->getCategory((string) $command->title)
        );

        $this->repository->save($link);
    }
}