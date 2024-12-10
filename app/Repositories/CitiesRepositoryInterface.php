<?php

namespace App\Repositories;

use App\Models\City;

/**
* Interface CitiesRepositoryInterface
* @package App\Repositories
*/
interface CitiesRepositoryInterface
{
    /**
     * @param array $attributes
     * @return City
     */
    public function create(array $attributes): City;

    /**
     * @param array $attributes
     * @param int $id
     * @return City
     */
    public function update(array $attributes, int $id): City;

    /**
     * @param int $id
     * @return City
     */
    public function find(int $id): ?City;


    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
