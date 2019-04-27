<?php

namespace ArchLayer\Repository\Concern;

use ArchLayer\FilterSort\Contract\SortBagInterface;
use ArchLayer\FilterSort\Contract\FilterBagInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent;


/**
 * Trait RepositoryCanFilter
 *
 * @package ArchLayer\Repository\Concern
 */
trait RepositoryCanFilter
{
    /**
     * Apply the order by to the builder instance.
     *
     * @param Eloquent\Builder         $builder
     * @param SortBagInterface $sortBag
     *
     * @return void
     */
    protected function applyOrder(Eloquent\Builder &$builder, SortBagInterface $sortBag): void
    {
        foreach ($sortBag as $column => $direction) {
            $builder->orderBy($column, $direction);
        }
    }

    /**
     * Apply filters to the query builder.
     *
     * @param Eloquent\Builder           $builder
     * @param FilterBagInterface $filterBag
     *
     * @return void
     */
    abstract protected function applyFilters(Eloquent\Builder &$builder, FilterBagInterface $filterBag): void;

    /**
     * Find a subset of records within the collection and order them accordingly.
     *
     * @param FilterBagInterface|null $filterBag
     * @param SortBagInterface|null   $sortBag
     *
     * @return Eloquent\Collection
     */
    public function find(?FilterBagInterface $filterBag, ?SortBagInterface $sortBag): Eloquent\Collection
    {
        $builder = $this->builder();

        $filterBag and $this->applyFilters($builder, $filterBag);
        $sortBag and $this->applyOrder($builder, $sortBag);

        return $builder->get();
    }

    /**
     * Find a subset of records within the collection ordered accordingly and paginate them.
     *
     * @param FilterBagInterface|null $filterBag
     * @param SortBagInterface|null   $sortBag
     * @param int                             $pageNumber
     * @param int                             $perPage
     *
     * @return LengthAwarePaginator
     */
    public function findPaginated(
        ?FilterBagInterface $filterBag,
        ?SortBagInterface $sortBag,
        int $pageNumber = 1,
        int $perPage = 100
    ): LengthAwarePaginator
    {
        $builder = $this->builder();

        $filterBag and $this->applyFilters($builder, $filterBag);
        $sortBag and $this->applyOrder($builder, $sortBag);

        return $builder->paginate($perPage, ['*'], $this->getPageName(), $pageNumber);
    }

}
