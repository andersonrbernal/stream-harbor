<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\User;
use App\Repositories\CountryRepository;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, function () {
            $user = new User();
            return new UserRepository($user);
        });

        $this->app->bind(CountryRepositoryInterface::class, function () {
            $country = new Country();
            return new CountryRepository($country);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
