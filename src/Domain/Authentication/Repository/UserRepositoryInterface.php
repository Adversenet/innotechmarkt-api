<?php

declare(strict_types=1);

namespace Domain\Authentication\Repository;

use Domain\Authentication\Entity\User;
use Domain\Shared\Repository\DataRepositoryInterface;

/**
 * class UserRepositoryInterface
 */
interface UserRepositoryInterface extends DataRepositoryInterface
{
    public function findOneByEmail(string $email): ?User;
    public function findOneByUsername(string $username): ?User;
    public function findOneByEmailOrUsername(string $emailOrUsername): ?User;
    public function upgradePassword(User $user, string $password): void;
}