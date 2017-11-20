<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class SidebarCategoriesViewComposer
{

    public function compose(View $view)
    {
        $view->with('categories', Category::take(4)->get());
    }

}