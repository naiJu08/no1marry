<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!app()->environment('local') && env('FORCE_HTTPS') === 'On') {
            URL::forceScheme('https');
        } else if (app()->environment('local')) {
            URL::forceScheme('http');
        }
    }
}
