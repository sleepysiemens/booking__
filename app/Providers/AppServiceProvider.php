<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TravelpayoutsService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TravelpayoutsService::class, function ($app) {
            return new TravelpayoutsService(config('services.travelpayouts.api_key'));
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
