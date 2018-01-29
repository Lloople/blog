<?php

namespace App\Providers;

use App\Interfaces\AboutMeServiceInterface;
use App\Models\Theme;
use App\Services\AboutMeService;
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

    public function register()
    {
        $this->app->bind(AboutMeServiceInterface::class, AboutMeService::class);
        $this->app->singleton('theme', function () {
            return $this->getSelectedTheme();
        });
    }

    private function getSelectedTheme()
    {
        $theme = Theme::where('selected', true)->first();

        if ($theme === null) {
            $theme = Theme::first();
        }

        if ($theme === null) {
            $theme = factory(Theme::class)->create();
        }

        return $theme;
    }
}
