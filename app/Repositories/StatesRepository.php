<?php

namespace App\Repositories;

use App\Models\State;
use Illuminate\Database\Eloquent\Collection;

class StatesRepository  implements StatesRepositoryInterface
{
    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return State::all();
    }

    public function create(array $attributes): State
    {
        // TODO: Implement create() method.
    }

    public function update(array $attributes, int $id): State
    {
        // TODO: Implement update() method.
    }

    public function find(int $id): ?State
    {
        // TODO: Implement find() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
