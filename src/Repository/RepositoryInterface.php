<?php

namespace ArchLayer\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface RepositoryInterface
 *
 * @package ArchLayer\Repository
 */
interface RepositoryInterface
{
    /**
     * Get a new instance of the model query builder.
     *
     * @return Builder
     */
    public function builder(): Builder;

    /**
     * Get a new instance of the bound model.
     *
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes = []): Model;

    /**
     * Delete a model.
     *
     * @param Model $model
     *
     * @return bool
     */
    public function delete(Model $model): bool;

    /**
     * Delete multiple records.
     *
     * @param array $records
     *
     * @return void
     */
    public function deleteMany(array $records): void;

    /**
     * Check the existence of an entity by primary key value.
     *
     * @param string $id
     *
     * @return bool
     */
    public function existsUsingId(string $id): bool;

    /**
     * Get a blank instance of the model.
     *
     * @return Model
     */
    public function getModel(): Model;

    /**
     * Get the page parameter name.
     *
     * @return string
     */
    public function getPageName(): string;

    /**
     * Load a model using the primary key value.
     *
     * @param string $id The primary key value.
     *
     * @return Model
     */
    public function findUsingId(string $id): Model;

    /**
     * Save the changes for a given model.
     *
     * @param Model $model
     *
     * @return bool
     */
    public function save(Model $model): bool;

    /**
     * Set the repository model.
     *
     * @param Model $model
     *
     * @return void
     */
    public function setModel(Model $model): void;
}
