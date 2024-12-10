<?php

namespace App\Repositories;

use App\Models\CarModel;

/**
* Interface CarModelsRepositoryInterface
* @package App\Repositories
*/
interface CarModelsRepositoryInterface
{
    /**
     * @param array $attributes
     * @return CarModel
     */
    public function create(array $attributes): CarModel;

    /**
     * @param array $attributes
     * @param int $id
     * @return CarModel
     */
    public function update(array $attributes, int $id): CarModel;

    /**
     * @param int $id
     * @return CarModel
     */
    public function find(int $id): ?CarModel;


    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
