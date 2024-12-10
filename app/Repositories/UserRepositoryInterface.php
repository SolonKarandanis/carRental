<?php

namespace App\Repositories;

use App\Models\User;

/**
* Interface UserRepositoryInterface
* @package App\Repositories
*/
interface UserRepositoryInterface
{
    /**
     * @param array $attributes
     * @return User
     */
    public function create(array $attributes): User;

    /**
     * @param array $attributes
     * @param int $id
     * @return User
     */
    public function update(array $attributes, int $id): User;

    /**
     * @param int $id
     * @return User
     */
    public function find(int $id): ?User;


    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
