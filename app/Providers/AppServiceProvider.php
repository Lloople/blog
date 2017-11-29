<?php

namespace App\Providers;

use App\Theme;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('theme', function () {

            return \App\Models\Theme::where('selected', true)->first();

        });
    }
}
