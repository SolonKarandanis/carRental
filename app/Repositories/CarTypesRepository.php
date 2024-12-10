<?php

namespace App\Repositories;

use App\Models\CarType;
use Illuminate\Database\Eloquent\Collection;

class CarTypesRepository implements CarTypesRepositoryInterface
{
    /**
    * CarTypesRepository constructor.
    *
    * @param CarType $model
    */
   public function __construct(CarType $model)
   {
   }

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return CarType::all();
    }

    public function create(array $attributes): CarType
    {
        // TODO: Implement create() method.
    }

    public function update(array $attributes, int $id): CarType
    {
        // TODO: Implement update() method.
    }

    public function find(int $id): ?CarType
    {
        // TODO: Implement find() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
