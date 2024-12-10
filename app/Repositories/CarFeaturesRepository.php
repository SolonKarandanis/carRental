<?php

namespace App\Repositories;

use App\Models\CarFeatures;

class CarFeaturesRepository implements CarFeaturesRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function create(array $attributes): CarFeatures
    {
        return CarFeatures::create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, int $id): CarFeatures
    {
        $carFeatures = CarFeatures::findOrFail($id);
        $carFeatures->fill($attributes)->save();
        return $carFeatures;
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): ?CarFeatures
    {
        return CarFeatures::findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): void
    {
        $carFeatures = CarFeatures::findOrFail($id);
        $carFeatures->delete();
    }
}
