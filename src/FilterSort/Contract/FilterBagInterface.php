<?php

namespace ArchLayer\FilterSort\Contract;

/**
 * Interface FilterBagInterface
 *
 * @package ArchLayer\FilterSort\Contract
 */
interface FilterBagInterface
{
    /**
     * Get the default filters.
     *
     * @return array
     */
    public function getDefaultValues(): array;

    /**
     * Map the parameters and return them, anything not returned from the map is excluded.
     *
     * @param array $parameters
     *
     * @return array
     */
    public function map(array $parameters): array;
}
