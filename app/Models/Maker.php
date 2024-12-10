<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Maker extends CarModel
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =[
        'name',
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function models(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }
}
