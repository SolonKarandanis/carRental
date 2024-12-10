<?php

namespace App\Repositories;

use App\Models\State;

/**
* Interface StatesRepositoryInterface
* @package App\Repositories
*/
interface StatesRepositoryInterface
{
    /**
     * @param array $attributes
     * @return State
     */
    public function create(array $attributes): State;

    /**
     * @param array $attributes
     * @param int $id
     * @return State
     */
    public function update(array $attributes, int $id): State;

    /**
     * @param int $id
     * @return State
     */
    public function find(int $id): ?State;


    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
