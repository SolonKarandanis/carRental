<?php

namespace App\Dtos;

use App\Traits\StaticCreateSelf;
use Illuminate\Database\Eloquent\Collection;

class CarInfoDTO
{
    use StaticCreateSelf;

    public readonly Collection $carTypes;
    public readonly Collection $fuelTypes;
    public readonly Collection $makers;
    public readonly Collection $models;
    public readonly Collection $states;
    public readonly Collection $cities;
    
}