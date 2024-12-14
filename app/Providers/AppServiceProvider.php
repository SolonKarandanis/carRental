<?php

namespace App\Providers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination');
        DB::listen(function ($query) {
            Log::info($query->sql, $query->bindings);
        });
        Gate::define('edit-car', function(User $user, Car $car){
            return $car->owner()->is($user);
        });
    }
}
