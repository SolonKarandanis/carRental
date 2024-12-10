<?php

namespace App\Repositories;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarRepository implements CarRepositoryInterface
{

    public function create(array $attributes): Car
    {
        return Car::create($attributes);
    }

    public function update(array $attributes , int $id): Car
    {
        $car = Car::findOrFail($id);
        $car->fill($attributes)->save();
        return $car;
    }

    public function delete(int $id): void
    {
        $car = Car::findOrFail($id);
        $car->delete();
    }

    /**
    * @param bool $withRelations
    * @return Car[]
    */
   public function findPubllishedCars(bool $withRelations): Collection
   {
        $query = Car::where('published_at','<',now());

        if($withRelations){
            $query -> with('city','maker','model','carType','fuelType','primaryImage');
        }

        $cars= $query->orderBy('published_at','desc')
            -> limit(30)
            -> get();

        return $cars;
   }

   /**
    * @param int $id
    * @param int $paginate
    * @return Collection
    */
    public function findUsersCars(int $id,int $paginate): LengthAwarePaginator
    {
        $cars= Car::where('user_id','=',$id)
            ->orderBy('created_at','desc')
            ->with('city','maker','model','carType','fuelType','primaryImage')
            ->paginate($paginate);

        return $cars;
    }

    /**
    * @param int $id
    * @param int $paginate
    * @return LengthAwarePaginator
    */
    public function findUsersFavouriteCars(int $id,int $paginate): LengthAwarePaginator
    {
        $cars= User::find($id)
            ->favouriteCars()
            ->orderBy('created_at','desc')
            ->with('city','maker','model','carType','fuelType','primaryImage')
            ->paginate($paginate);

        return $cars;
    }

    /**
    * @param $id
    * @return Car
    */
    public function find(int $id): ?Car
    {
        $car = Car::select([
            'cars.*',
            'cities.name as city_name',
            'cities.state_id as state_id',
            'car_images.image_path as  image_path',
            'makers.name as maker_name',
            'models.name as model_name',
            'car_types.name as car_type_name',
            'fuel_types.name as fuel_type_name',
            'car_features.*',
            'users.id as user_id',
            'users.name as user_name'
        ])
            ->join('cities','cities.id','cars.city_id')
            ->join('makers','makers.id','cars.maker_id')
            ->join('models','models.id','cars.model_id')
            ->join('car_types','car_types.id','cars.car_type_id')
            ->join('fuel_types','fuel_types.id','cars.fuel_type_id')
            ->join('car_images','car_images.car_id','cars.id')
            ->join('car_features','car_features.car_id','cars.id')
            ->join('users','users.id','cars.user_id')
            ->findOrFail($id);
        return $car;
    }

    /**
    * @param int $userId
    * @return int
    */
    public function countUsersCars(int $userId):int
    {
        $carCount=Car::where('cars.user_id','=',$userId)->count();
        return $carCount;
    }

    /**
    * @param int $carId
    * @return Collection
    */
    public function findCarImages(int $carId):Collection
    {
        return CarImage::where('car_id','=',$carId)->get();
    }


    public function searchCars(int $paginate, array $params): LengthAwarePaginator
    {
        $query = Car::where('published_at','<',now())
            ->with('city','maker','model','carType','fuelType','primaryImage')
            ->orderBy('published_at','desc');

        $keys = array_keys($params);

        foreach ($keys as $key) {
            $value = $params[$key];
            if($key == 'maker_id' && !is_null($value)){
                $query->where('cars.maker_id','=',$value);
            }
            if($key == 'model_id' && !is_null($value)){
                $query->where('cars.model_id','=',$value);
            }
            if($key == 'state_id' && !is_null($value)){
                $query->join('cities','cities.id','=','cars.city_id')
                    ->where('cities.state_id','=',$value);
            }
            if($key == 'city_id' && !is_null($value)){
                $query->where('cars.city_id','=',$value);
            }
            if($key == 'car_type_id' && !is_null($value)){
                $query->where('cars.car_type_id','=',$value);
            }
            if($key == 'fuel_type_id' && !is_null($value)){
                $query->where('cars.fuel_type_id','=',$value);
            }
            if($key == 'year_from' && !is_null($value)){
//                $startDate = Carbon::createFromFormat('Y-m-d', $value);
                $query->where('cars.year','>=',$value);
            }
            if($key == 'year_to' && !is_null($value)){
//                $endDate = Carbon::createFromFormat('Y-m-d', $value);
                $query->where('cars.year','<=',$value);
            }
            if($key == 'price_from' && !is_null($value)){
                $query->where('cars.price','>=',$value);
            }
            if($key == 'price_to' && !is_null($value)){
                $query->where('cars.price','<=',$value);
            }
            if($key == 'mileage' && !is_null($value)){
                $query->where('cars.mileage','<=',$value);
            }
            if($key == 'sort' && !is_null($value)){
                if($value=='price'){
                    $query->reorder()->orderBy('cars.price', 'asc');
                }
                elseif ($value=='-price'){
                    $query->reorder()->orderBy('cars.price', 'desc');
                }
            }
        }
        $results = $query
            ->paginate($paginate);
        return $results;
    }
}
