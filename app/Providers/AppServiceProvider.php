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
        // https://laracasts.com/discuss/channels/laravel/mixed-content-issue-content-must-be-served-as-https
        if(env('APP_ENV') !== 'local')
        {
            URL::forceScheme('https');
        }
    }
}
