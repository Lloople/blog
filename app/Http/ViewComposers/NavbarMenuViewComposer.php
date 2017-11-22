<?php

namespace App\Http\ViewComposers;

use App\Models\Tag;
use Illuminate\View\View;

class NavbarMenuViewComposer
{

    public function compose(View $view)
    {
        $navbarMenu = [
            [
                'title' => 'Home Page',
                'url' => route('posts.index'),
                'active' => request()->routeIs('/') || request()->routeIs('*posts*')
            ],
            [
                'title' => 'Categories',
                'url' => route('categories.index'),
                'active' => request()->routeIs('*categories*')
            ],
            [
                'title' => 'Tags',
                'url' => route('tags.index'),
                'active' => request()->routeIs('*tags*')
            ],
        ];

        $view->with('navbarMenu', collect($navbarMenu)->map(function ($menuElement) {
            return (object)$menuElement;
        }));
    }

}