<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\User;
use App\Models\Video;
use App\Repositories\CountryRepository;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\VideoRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\VideoRepository;
use Illuminate\Support\ServiceProvider;
use Urodoz\Truncate\TruncateService;

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

        $this->app->bind(VideoRepositoryInterface::class, function () {
            $video = new Video();
            return new VideoRepository($video);
        });

        $this->app->bind(TruncateService::class, function () {
            return new TruncateService();
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
