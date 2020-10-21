<?php

namespace App\Providers;

use Facebook\Facebook;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class FacebookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Facebook::class, function ($app) {
            Log::info('Config', config('facebook.config'));
            return new Facebook(config('facebook.config'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
