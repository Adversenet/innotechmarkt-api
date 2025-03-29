<?php

declare(strict_types=1);

namespace Application\Category\Handler;

use Application\Category\Command\UpdateCategoryCommand;
use Application\Shared\Mapper;
use Domain\Category\Repository\CategoryRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * class UpdateCategoryHandler
 */
#[AsMessageHandler]
final readonly class UpdateCategoryHandler
{
    public function __construct(
        private CategoryRepositoryInterface $repository
    ) {
    }

    /**
     * This method is called when the message is handled.
     *
     * @param UpdateCategoryCommand $command
     * @return void
     */
    public function __invoke(UpdateCategoryCommand $command): void
    {
        $this->repository->save(Mapper::getHydratedObject($command, $command->_entity));
    }
}