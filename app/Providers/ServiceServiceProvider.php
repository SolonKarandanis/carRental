<?php

namespace App\Providers;

use App\Repositories\CarFeaturesRepositoryInterface;
use App\Repositories\CarRepositoryInterface;
use App\Repositories\CarTypesRepositoryInterface;
use App\Repositories\CitiesRepositoryInterface;
use App\Repositories\FuelTypesRepositoryInterface;
use App\Repositories\MakersRepositoryInterface;
use App\Repositories\CarModelsRepositoryInterface;
use App\Repositories\StatesRepositoryInterface;
use App\Services\CarService;
use App\Services\CarServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(CarServiceInterface::class,function($app){
            return new CarService(
                $app->make(CarRepositoryInterface::class),
                $app->make(CarTypesRepositoryInterface::class),
                $app->make(CarFeaturesRepositoryInterface::class),
                $app->make(FuelTypesRepositoryInterface::class),
                $app->make(MakersRepositoryInterface::class),
                $app->make(CarModelsRepositoryInterface::class),
                $app->make(StatesRepositoryInterface::class),
                $app->make(CitiesRepositoryInterface::class),
            );
        });
    }
}
