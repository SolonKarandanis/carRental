<?php

namespace App\Repositories;

use App\Models\CarModel;
use Illuminate\Database\Eloquent\Collection;

class CarModelsRepository implements CarModelsRepositoryInterface
{
    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return CarModel::all();
    }

    public function create(array $attributes): CarModel
    {
        // TODO: Implement create() method.
    }

    public function update(array $attributes, int $id): CarModel
    {
        // TODO: Implement update() method.
    }

    public function find(int $id): ?CarModel
    {
        // TODO: Implement find() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
