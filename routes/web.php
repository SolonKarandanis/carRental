<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function (){
    Route::get('car/search',[CarController::class,'search'])
        ->name('car.search');

    Route::get('car/watchlist',[CarController::class,'watchlist'])
        ->name('car.watchlist');

    Route::get('car/index',[CarController::class,'index'])
        ->name('car.index');

    Route::get('car/create',[CarController::class,'create'])
        ->name('car.create');

    Route::post('car/{car}',[CarController::class,'update'])
        ->name('car.update');

    Route::get('car/{car}',[CarController::class,'show'])
        ->name('car.show');

    Route::delete('car/{car}',[CarController::class,'destroy'])
        ->name('car.destroy');

    Route::get('car/{car}/edit',[CarController::class,'edit'])
        ->name('car.edit')
        ->can('edit-car','car');
});

require __DIR__.'/auth.php';
