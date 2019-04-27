<?php

namespace ArchLayer\Service;

use ArchLayer\Repository\RepositoryInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class Service
 *
 * @package ArchLayer\Service
 */
abstract class Service implements Contract\ServiceInterface
{
    /**
     * The repository.
     *
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * {{@inheritdoc}}
     */
    public function setRepository(RepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }

    /**
     * Get the Repository.
     *
     * @return RepositoryInterface
     */
    protected function getRepository(): RepositoryInterface
    {
        return $this->repository;
    }

    /**
     * Get the fillable entity attributes from the parameter bag.
     *
     * @param ParameterBag $parameterBag
     *
     * @return array
     */
    protected function getFillableParameters(ParameterBag $parameterBag): array
    {
        return array_only($parameterBag->all(), $this->getRepository()->getModel()->getFillable());
    }
}
