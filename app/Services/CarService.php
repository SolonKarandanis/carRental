<?php

namespace App\Services;

use App\Dtos\CarDetailsDTO;
use App\Dtos\CarInfoDTO;
use App\Models\Car;
use App\Repositories\CarFeaturesRepositoryInterface;
use App\Repositories\CarRepositoryInterface;
use App\Repositories\CarTypesRepositoryInterface;
use App\Repositories\CitiesRepositoryInterface;
use App\Repositories\FuelTypesRepositoryInterface;
use App\Repositories\MakersRepositoryInterface;
use App\Repositories\CarModelsRepositoryInterface;
use App\Repositories\StatesRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class CarService implements CarServiceInterface
{
    public function __construct(
        protected CarRepositoryInterface $carRepository,
        protected CarTypesRepositoryInterface $carTypesRepository,
        protected CarFeaturesRepositoryInterface $carfeaturesRepository,
        protected FuelTypesRepositoryInterface $fuelTypesRepository,
        protected MakersRepositoryInterface $makersRepository,
        protected CarModelsRepositoryInterface $modelsRepository,
        protected StatesRepositoryInterface $statesRepository,
        protected CitiesRepositoryInterface $citiesRepository,
    )
    {

    }

    /**
    * @param bool $withRelations
    * @return Collection
    */
   public function findPubllishedCars(bool $withRelations): Collection
   {
        try{
            DB::beginTransaction();
                $cars= $this->carRepository->findPubllishedCars($withRelations);
            DB::commit();
            return $cars;
        }
        catch (\Exception $e){
            DB::rollBack();
            return collect();
        }
   }

   /**
    * @param int $id
    * @param int $paginate
    * @return LengthAwarePaginator
    */
    public function findUsersCars(int $id,int $paginate): LengthAwarePaginator
    {
        try{
            DB::beginTransaction();
                $cars= $this->carRepository->findUsersCars($id,$paginate);
            DB::commit();
            return $cars;
        }
        catch (\Exception $e){
            DB::rollBack();
            return new LengthAwarePaginator([],0,0,0);
        }
    }

    /**
    * @param int $id
    * @param int $paginate
    * @return LengthAwarePaginator
    */
    public function findUsersFavouriteCars(int $id,int $paginate): LengthAwarePaginator
    {
        try{
            DB::beginTransaction();
                $cars= $this->carRepository->findUsersFavouriteCars($id,$paginate);
            DB::commit();
            return $cars;
        }
        catch (\Exception $e){
            DB::rollBack();
            return new LengthAwarePaginator([],0,0,0);
        }
    }

    /**
    * @param int $id
    * @return CarDetailsDTO
    */
    public function findCarDetails(int $id): CarDetailsDTO
    {
        try{
            DB::beginTransaction();
                $car = $this->carRepository->find($id);
                $images = $this->carRepository->findCarImages($id);
                $carCount = $this-> carRepository->countUsersCars($car->user_id);
                $carDetail = CarDetailsDTO::create([
                    'car'=> $car,
                    'images'=> $images,
                    'carCount'=> $carCount,
                ]);
            DB::commit();
            return $carDetail;
        }
        catch (\Exception $e){
            DB::rollBack();
            return CarDetailsDTO::create([
                'car'=> null,
                'carCount' => 0,
            ]);
        }
    }

    /**
     * @param int $id
     * @return Car
     */
    public function findCar(int $id): Car
    {
        return $this->carRepository->find($id);
    }

    /**
     * @param int $paginate
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function searchCars(int $paginate, array $params): LengthAwarePaginator
    {
        return $this->carRepository->searchCars($paginate, $params);
//        try{
//            DB::beginTransaction();
//            $cars= $this->carRepository->findUsersFavouriteCars($id,$paginate);
//            DB::commit();
//            return $cars;
//        }
//        catch (\Exception $e){
//            DB::rollBack();
//            return new LengthAwarePaginator([],0,0,0);
//        }
    }

   /**
    * @param array $attributes
    * @return Car
    */
    public function create(array $attributes): Car
    {
        return $this->carRepository->create($attributes);
        // event(new UserRegistered($user));
    }

    /**
    * @param array $attributes
    * @param int $id
    * @return Car
    */
    public function update(array $attributes, int $id): Car
    {
        $this->carfeaturesRepository->update($attributes, $id);
        return $this->carRepository->update($attributes, $id);
    }

    /**
    * @param int $id
    * @return void
    */
    public function delete(int $id): void
    {
        $this->carRepository->delete($id);
    }

    /**
    * @return CarInfoDTO
    */
   public function fetchCarInfo():CarInfoDTO | null
   {
        try{
            DB::beginTransaction();
            $carTypes = $this->carTypesRepository->findAll();
            $fuelTypes = $this->fuelTypesRepository->findAll();
            $makers=$this->makersRepository->findAll();
            $models=$this->modelsRepository->findAll();
            $states=$this->statesRepository->findAll();
            $cities=$this->citiesRepository->findAll();
            $carInfo = CarInfoDTO::create([
                'carTypes'=> $carTypes,
                'fuelTypes'=> $fuelTypes,
                'makers'=> $makers,
                'models'=> $models,
                'states'=> $states,
                'cities'=> $cities,
            ]);
            DB::commit();
            return $carInfo;
        }
        catch (\Exception $e){
            DB::rollBack();
            return null;
        }
   }


    public function getYears(): array
    {
       return array_combine(range(date("Y"), 1970), range(date("Y"), 1970));
    }
}
