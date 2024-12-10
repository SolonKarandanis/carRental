<?php

namespace App\Dtos;

use App\Models\Car;
use App\Traits\StaticCreateSelf;
use Illuminate\Database\Eloquent\Collection;

class CarDetailsDTO
{
    use StaticCreateSelf;

    public readonly Car $car;

    public readonly Collection $images;
    public readonly int $carCount;
}