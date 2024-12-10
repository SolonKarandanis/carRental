<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository  implements UserRepositoryInterface
{

    public function create(array $attributes): User
    {
        // TODO: Implement create() method.
    }

    public function update(array $attributes, int $id): User
    {
        // TODO: Implement update() method.
    }

    public function find(int $id): ?User
    {
        // TODO: Implement find() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
