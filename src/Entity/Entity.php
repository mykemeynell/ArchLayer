<?php

namespace ArchLayer\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entity
 *
 * @property array $fillable
 * @property array $casts
 * @property array $dates
 * @property string $table
 *
 * @package ArchLayer\Entity
 */
class Entity extends Model
{
    /**
     * Set the table name string.
     *
     * @param string $table
     */
    protected function setTable(string $table): void
    {
        $this->table = $table;
    }

    /**
     * Set the dates array.
     *
     * @param array $dates
     */
    protected function setDates(array $dates): void
    {
        $this->dates = $dates;
    }

    /**
     * Set the casts array.
     *
     * @param array $casts
     */
    protected function setCasts(array $casts): void
    {
        $this->casts = $casts;
    }

    /**
     * Set the fillable array.
     *
     * @param array $fillable
     */
    protected function setFillable(array $fillable): void
    {
        $this->fillable = $fillable;
    }
}
