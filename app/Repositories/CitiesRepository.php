<?php

namespace App\Repositories;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CitiesRepository  implements CitiesRepositoryInterface
{

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return City::all();
    }

    public function create(array $attributes): City
    {
        // TODO: Implement create() method.
    }

    public function update(array $attributes, int $id): City
    {
        // TODO: Implement update() method.
    }

    public function find(int $id): ?City
    {
        // TODO: Implement find() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
