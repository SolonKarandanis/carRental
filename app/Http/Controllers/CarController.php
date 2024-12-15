<?php

namespace App\Http\Controllers;


use App\Http\Requests\Car\UpdateCarRequest;
use App\Mail\CarBought;
use App\Models\Car;
use App\Services\CarServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class CarController extends Controller
{

    public function __construct(
        protected CarServiceInterface $carsService
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = $this->carsService->findUsersCars(1,5);
        return view('car.index',['cars'=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carInfo = $this->carsService->fetchCarInfo();
        $years = $this->carsService->getYears();
        return view('car.create',[
            'carTypes'=> $carInfo->carTypes,
            'fuelTypes'=> $carInfo->fuelTypes,
            'makers'=> $carInfo->makers,
            'models'=> $carInfo->models,
            'states'=> $carInfo->states,
            'cities'=> $carInfo->cities,
            'years'=> $years,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|unique:users,email',
        //     'password' => 'required|confirmed'
        // ]);
        // $data['name'] = $request->name;
        return view('car.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $carDetails = $this->carsService->findCarDetails($car->id);
        return view('car.show',['car'=>$carDetails->car, 'carCount'=>$carDetails->carCount, 'images'=> $carDetails->images]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $car = $this->carsService->findCar($car->id);
        $carInfo = $this->carsService->fetchCarInfo();
        $years = $this->carsService->getYears();

        return view('car.edit',[
            'car'=>$car,
            'carTypes'=> $carInfo->carTypes,
            'fuelTypes'=> $carInfo->fuelTypes,
            'makers'=> $carInfo->makers,
            'models'=> $carInfo->models,
            'states'=> $carInfo->states,
            'cities'=> $carInfo->cities,
            'years'=> $years,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $this->carsService->update($request->all(), $car->id);
        return redirect()
            ->route('car.index')
            ->with('success', 'Car successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if($car->owner()->isNot(Auth::user())){
            abort(403);
        }
        $this->carsService->delete($car->id);
        return redirect()
            ->route('car.index')
            ->with('success', 'Car deleted successfully!');
    }

    public function search(Request $request)
    {
        $results = $this->carsService->searchCars(5,$request->all());
        $carInfo = $this->carsService->fetchCarInfo();
        $mileage=[
            10000=>'10,000 or less',
            20000=>'20,000 or less',
            30000=>'30,000 or less',
            40000=>'40,000 or less',
            50000=>'50,000 or less',
            60000=>'60,000 or less',
            70000=>'70,000 or less',
            80000=>'80,000 or less',
            90000=>'90,000 or less',
            100000=>'100,000 or less',
            150000=>'150,000 or less',
            200000=>'200,000 or less',
            250000=>'250,000 or less',
            300000=>'300,000 or less',
        ];
        $order=[
            'price'=>'Price Asc',
            '-price'=>'Price Desc'
        ];
        return view('car.search', [
            'results'=>$results,
            'carTypes'=> $carInfo->carTypes,
            'fuelTypes'=> $carInfo->fuelTypes,
            'makers'=> $carInfo->makers,
            'models'=> $carInfo->models,
            'states'=> $carInfo->states,
            'cities'=> $carInfo->cities,
            'mileage' => $mileage,
            'order' => $order,
        ]);
    }

    public function watchlist()
    {
        $cars = $this->carsService->findUsersFavouriteCars(5,5);
        return view('car.watchlist',['cars'=>$cars]);
    }

    public function buyCar(Car $car)
    {
        Mail::to(Auth::user())->queue(
            new CarBought($car)
        );
    }
}
