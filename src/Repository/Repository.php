<?php

namespace ArchLayer\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Repository.
 *
 * @package ArchLayer\Repository
 */
abstract class Repository implements RepositoryInterface
{
    /**
     * The ORM model.
     *
     * @var Model
     */
    protected $model;

    /**
     * The page name.
     *
     * @var string
     */
    protected $pageName = 'page';

    /**
     * {{@inheritdoc}}
     */
    public function builder(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * {{@inheritdoc}}
     */
    public function create(array $attributes = []): Model
    {
        return $this->model->newInstance($attributes);
    }

    /**
     * {{@inheritdoc}}
     */
    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    /**
     * {{@inheritdoc}}
     */
    public function deleteMany(array $records): void
    {
        foreach ($records as $record) {
            $this->delete($record);
        }
    }

    /**
     * {{@inheritdoc}}
     */
    public function existsUsingId(string $value): bool
    {
        return $this->builder()->where($this->getModel()->getKeyName(), $value)->exists();
    }

    /**
     * {{@inheritdoc}}
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findUsingId(string $value): Model
    {
        return $this->builder()->findOrFail($value);
    }

    /**
     * {{@inheritdoc}}
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * {{@inheritdoc}}
     */
    public function getPageName(): string
    {
        return $this->pageName;
    }

    /**
     * {{@inheritdoc}}
     */
    public function save(Model $model): bool
    {
        return $model->save();
    }

    /**
     * {{@inheritdoc}}
     */
    public function setModel(Model $model): void
    {
        $this->model = $model;
    }
}
