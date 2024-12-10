<?php

namespace App\Repositories;

use App\Models\FuelType;

/**
* Interface FuelTypesRepositoryInterface
* @package App\Repositories
*/
interface FuelTypesRepositoryInterface
{
    /**
     * @param array $attributes
     * @return FuelType
     */
    public function create(array $attributes): FuelType;

    /**
     * @param array $attributes
     * @param int $id
     * @return FuelType
     */
    public function update(array $attributes, int $id): FuelType;

    /**
     * @param int $id
     * @return FuelType
     */
    public function find(int $id): ?FuelType;


    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
