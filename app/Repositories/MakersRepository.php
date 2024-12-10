<?php

namespace App\Repositories;

use App\Models\Maker;
use Illuminate\Database\Eloquent\Collection;

class MakersRepository implements MakersRepositoryInterface
{


    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return Maker::all();
    }

    public function create(array $attributes): Maker
    {
        // TODO: Implement create() method.
    }

    public function update(array $attributes, int $id): Maker
    {
        // TODO: Implement update() method.
    }

    public function find(int $id): ?Maker
    {
        // TODO: Implement find() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
