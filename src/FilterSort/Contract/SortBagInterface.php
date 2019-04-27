<?php

namespace ArchLayer\FilterSort\Contract;

/**
 * Interface SortBagInterface
 *
 * @package ArchLayer\FilterSort\Contract
 */
interface SortBagInterface
{
    /**
     * Get the default sorting parameters.
     *
     * @return array
     */
    public function getDefaultValues(): array;
}
