<?php

declare(strict_types=1);

namespace Application\Category\Handler;

use Application\Category\Command\DeleteCategoryCommand;
use Domain\Category\Repository\CategoryRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * class DeleteLinkHandler
 */
#[AsMessageHandler]
final readonly class DeleteLinkHandler
{
    public function __construct(
        private CategoryRepositoryInterface $repository
    ) {
    }

    /**
     * This method is called when the message is handled.
     *
     * @param DeleteCategoryCommand $command
     * @return void
     */
    public function __invoke(DeleteCategoryCommand $command): void
    {
        $this->repository->delete($command->_entity);
    }
}