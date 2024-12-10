<?php

namespace App\Repositories;

use App\Models\CarFeatures;

/**
 * Interface CarFeaturesRepositoryInterface
 * @package App\Repositories
 */
interface CarFeaturesRepositoryInterface
{

    /**
     * @param array $attributes
     * @return CarFeatures
     */
    public function create(array $attributes): CarFeatures;

    /**
     * @param array $attributes
     * @param int $id
     * @return CarFeatures
     */
    public function update(array $attributes, int $id): CarFeatures;

    /**
     * @param int $id
     * @return CarFeatures
     */
    public function find(int $id): ?CarFeatures;


    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
