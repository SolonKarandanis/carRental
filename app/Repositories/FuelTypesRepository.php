<?php

namespace App\Repositories;

use App\Models\FuelType;
use Illuminate\Database\Eloquent\Collection;

class FuelTypesRepository implements FuelTypesRepositoryInterface
{

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return FuelType::all();
    }

    public function create(array $attributes): FuelType
    {
        // TODO: Implement create() method.
    }

    public function update(array $attributes, int $id): FuelType
    {
        // TODO: Implement update() method.
    }

    public function find(int $id): ?FuelType
    {
        // TODO: Implement find() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
