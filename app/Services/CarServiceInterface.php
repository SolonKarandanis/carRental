<?php

namespace App\Services;

use App\Dtos\CarDetailsDTO;
use App\Dtos\CarInfoDTO;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
* Interface CarServiceInterface
* @package App\Services
*/
interface CarServiceInterface
{

    /**
    * @param bool $withRelations
    * @return Collection
    */
   public function findPubllishedCars(bool $withRelations): Collection;

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
    * @param int $id
    * @return CarDetailsDTO
    */
    public function findCarDetails(int $id): CarDetailsDTO;

    /**
     * @param int $id
     * @return Car
     */
    public function findCar(int $id): Car;

    /**
     * @param int $paginate
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function searchCars(int $paginate, array $params): LengthAwarePaginator;

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
    public function update(array $attributes, int $id): Car;

    /**
    * @param int $id
    * @return void
    */
   public function delete(int $id): void;

    /**
    * @return CarInfoDTO
    */
   public function fetchCarInfo():CarInfoDTO| null;

    /**
     * @return array
     */
   public function getYears(): array;
}
