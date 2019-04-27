<?php

namespace ArchLayer\Service\Contract;

use ArchLayer\Repository\RepositoryInterface;

/**
 * Interface ServiceInterface
 *
 * @package ArchLayer\Service\Contract
 */
interface ServiceInterface
{
    /**
     * Set the repository.
     *
     * @param RepositoryInterface $repository
     *
     * @return void
     */
    public function setRepository(RepositoryInterface $repository): void;
}
