<?php

namespace App\Repositories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
* Interface CarRepositoryInterface
* @package App\Repositories
*/
interface CarRepositoryInterface
{

    /**
     * @param array $attributes
     * @return Car
     */
    public function create(array $attributes): Car;

    /**
     * @param array $attributes
     * @param int $id
     * @return Car
     */
    public function update(array $attributes,int $id): Car;

    /**
     * @param int $id
     * @return Car
     */
    public function find(int $id): ?Car;

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;

    /**
    * @param bool $withRelations
    * @return Collection
    */
   public function findPubllishedCars( bool $withRelations): Collection;

    /**
    * @param int $id
    * @param int $paginate
    * @return LengthAwarePaginator
    */
    public function findUsersCars(int $id,int $paginate): LengthAwarePaginator;

    /**
    * @param int $id
    * @param int $paginate
    * @return LengthAwarePaginator
    */
    public function findUsersFavouriteCars(int $id,int $paginate): LengthAwarePaginator;

    /**
    * @param int $userId
    * @return int
    */
    public function countUsersCars(int $userId):int;

    /**
    * @param int $carId
    * @return Collection
    */
    public function findCarImages(int $carId):Collection;

    /**
     * @param int $paginate
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function searchCars(int $paginate, array $params): LengthAwarePaginator;

}
