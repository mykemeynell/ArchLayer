<?php

namespace ArchLayer\FilterSort;

use Carbon\Carbon;
use Symfony\Component\HttpFoundation\ParameterBag;


/**
 * Class FilterBag
 *
 * @package ArchLayer\FilterSort
 */
abstract class FilterBag extends ParameterBag implements FilterBagInterface
{
    /**
     * {{@inheritdoc}}
     */
    public function __construct(array $parameters = [])
    {
        parent::__construct($this->map($parameters));
    }

    /**
     * Parse the input string into a DateTime object.
     *
     * @param string $dateTime|null
     *
     * @return Carbon|null
     */
    protected function parseCarbon(?string $dateTime): ?Carbon
    {
        return $dateTime ? Carbon::parse($dateTime) : null;
    }
}
