<?php

namespace App\Providers;

use App\Models\Theme;
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
            $selectedTheme = Theme::where('selected', true)->first();

            if ($selectedTheme === null) {
                return Theme::first();
            }

            return $selectedTheme;
        });
    }

}
