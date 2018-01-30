<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Interfaces\AboutMeServiceInterface;

class NavbarMenuViewComposer
{
    public function __construct(AboutMeServiceInterface $aboutMeService)
    {
        $this->aboutMeService = $aboutMeService;
    }

    public function compose(View $view)
    {
        $navbarMenu = [
            [
                'title' => 'Home Page',
                'url' => route('posts.index'),
                'active' => request()->routeIs('/') || request()->routeIs('*posts*'),
            ],
            [
                'title' => 'Categories',
                'url' => route('categories.index'),
                'active' => request()->routeIs('*categories*'),
            ],
            [
                'title' => 'Tags',
                'url' => route('tags.index'),
                'active' => request()->routeIs('*tags*'),
            ],
        ];

        if ($this->aboutMeService->hasContent()) {
            $navbarMenu[] = [
                'title' => 'About me',
                'url' => route('about-me.show'),
                'active' => request()->routeIs('about-me.show'),
            ];
        }

        $view->with('navbarMenu', collect($navbarMenu)->map(function ($menuElement) {
            return (object) $menuElement;
        }));
    }
}
