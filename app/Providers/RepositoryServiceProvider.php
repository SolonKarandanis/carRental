<?php

namespace App\Providers;

use App\Repositories\CarFeaturesRepository;
use App\Repositories\CarFeaturesRepositoryInterface;
use App\Repositories\CarRepository;
use App\Repositories\CarRepositoryInterface;
use App\Repositories\CarTypesRepository;
use App\Repositories\CarTypesRepositoryInterface;
use App\Repositories\CitiesRepository;
use App\Repositories\CitiesRepositoryInterface;
use App\Repositories\FuelTypesRepository;
use App\Repositories\FuelTypesRepositoryInterface;
use App\Repositories\MakersRepository;
use App\Repositories\MakersRepositoryInterface;
use App\Repositories\CarModelsRepository;
use App\Repositories\CarModelsRepositoryInterface;
use App\Repositories\StatesRepository;
use App\Repositories\StatesRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CarRepositoryInterface::class,CarRepository::class);
        $this->app->bind(CarFeaturesRepositoryInterface::class,CarFeaturesRepository::class);
        $this->app->bind(CarTypesRepositoryInterface::class,CarTypesRepository::class);
        $this->app->bind(FuelTypesRepositoryInterface::class,FuelTypesRepository::class);
        $this->app->bind(MakersRepositoryInterface::class,MakersRepository::class);
        $this->app->bind(CarModelsRepositoryInterface::class,CarModelsRepository::class);
        $this->app->bind(StatesRepositoryInterface::class,StatesRepository::class);
        $this->app->bind(CitiesRepositoryInterface::class,CitiesRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
