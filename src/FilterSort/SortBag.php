<?php

namespace ArchLayer\FilterSort;

use ArchLayer\FilterSort\Contract\SortBagInterface;
use Symfony\Component\HttpFoundation\ParameterBag as SymfonyParameterBag;

/**
 * Class SortBag.
 *
 * @package ArchLayer\FilterSort
 */
abstract class SortBag extends SymfonyParameterBag implements SortBagInterface
{
    /**
     * SortBag constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        parent::__construct($parameters ?: $this->getDefaultValues());
    }
}
