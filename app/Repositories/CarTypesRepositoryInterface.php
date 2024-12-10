<?php

namespace App\Repositories;


use App\Models\CarType;

/**
* Interface CarTypesRepositoryInterface
* @package App\Repositories
*/
interface CarTypesRepositoryInterface
{
    /**
     * @param array $attributes
     * @return CarType
     */
    public function create(array $attributes): CarType;

    /**
     * @param array $attributes
     * @param int $id
     * @return CarType
     */
    public function update(array $attributes, int $id): CarType;

    /**
     * @param int $id
     * @return CarType
     */
    public function find(int $id): ?CarType;


    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
