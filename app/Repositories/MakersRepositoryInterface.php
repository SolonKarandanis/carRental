<?php

namespace App\Repositories;

use App\Models\Maker;

/**
* Interface MakersRepositoryInterface
* @package App\Repositories
*/
interface MakersRepositoryInterface
{
    /**
     * @param array $attributes
     * @return Maker
     */
    public function create(array $attributes): Maker;

    /**
     * @param array $attributes
     * @param int $id
     * @return Maker
     */
    public function update(array $attributes, int $id): Maker;

    /**
     * @param int $id
     * @return Maker
     */
    public function find(int $id): ?Maker;


    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
