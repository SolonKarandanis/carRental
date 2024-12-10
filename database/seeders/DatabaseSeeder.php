<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\CarModel;
use App\Models\State;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Stratos Karandanis',
            'email' => 'skarandanis2@gmail.com',
            'password'=> '7ujm&UJM',
        ]);

        CarType::factory()->sequence(
            ['name'=>'Sedan'],
            ['name'=>'HatchBack'],
            ['name'=>'Pickup Truck'],
            ['name'=>'Minivan'],
            ['name'=>'Jeep'],
            ['name'=>'Coupe'],
            ['name'=>'Crossover'],
            ['name'=>'Sports Car'],
        )
            ->count(9)
            ->create();

        FuelType::factory()->sequence(
            ['name'=>'Gasoline'],
            ['name'=>'Diesel'],
            ['name'=>'Electric'],
            ['name'=>'Hybrid'],
        )
            ->count(4)
            ->create();

        $states =[
            'California'=>['Los Angeles','San Diego'],
            'Texas'=>['Huston','San Antonio'],
            'Florida'=>['Miami','Orlando'],
            'New York'=>['New York City','Buffalo'],
            'Illinois'=>['Chicago','Aurora'],
            'Ohio'=>['Columbus','Cleveland']
        ];

        foreach($states as $state=> $cities){
            State::factory()
                ->state(['name'=>$state])
                ->has(
                    City::factory()
                        ->count(count($cities))
                        ->sequence(...array_map(fn($city)=>['name'=>$city],$cities)),
                    'cities'
                )
                ->create();
        }

        $makers =[
            'Toyota'=>['Camry','Corolla','Rav4','Prius'],
            'Ford'=>['F-150','Escape','Mustang','Explorer'],
            'Honda'=>['Civic','Accord','CR-V','Pilot'],
            'Chevrolet'=>['Silverado','Impala','Malibu'],
            'Nissan'=>['Sentra','Maxima','Murano'],
            'Lexus'=>['RX400','RX450','RX350','ES350']
        ];

        foreach($makers as $maker=> $models){
            Maker::factory()
                ->state(['name'=>$maker])
                ->has(
                    CarModel::factory()
                        ->count(count($models))
                        ->sequence(...array_map(fn($model)=> ['name'=>$model],$models)),
                    'models'

                )
                ->create();
        }

        User::factory()
            ->count(3)
            ->create();

        User::factory()
            ->count(2)
            ->has(
                Car::factory()
                    ->count(50)
                    ->has(
                        CarImage::factory()
                            ->count(5)
                            ->sequence(fn(Sequence $sequence)=>['position'=>$sequence->index +1]),
                        'images'
                    )
                    ->hasFeatures(),
                'favouriteCars'
            )
            ->create();
    }
}
