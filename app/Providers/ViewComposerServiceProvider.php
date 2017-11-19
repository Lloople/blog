<?php

namespace App\Providers;

use App\Http\ViewComposers\SidebarCategoriesViewComposer;
use App\Http\ViewComposers\SidebarFeaturedPostsViewComposer;
use App\Http\ViewComposers\SidebarTagsViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('sidebar.featured_posts', SidebarFeaturedPostsViewComposer::class);
        View::composer('sidebar.categories', SidebarCategoriesViewComposer::class);
        View::composer('sidebar.tags', SidebarTagsViewComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
