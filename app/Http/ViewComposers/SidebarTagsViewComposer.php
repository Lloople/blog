<?php

namespace App\Http\ViewComposers;

use App\Models\Tag;
use Illuminate\View\View;

class SidebarTagsViewComposer
{

    public function compose(View $view)
    {
        $view->with('tags', Tag::take(20)->get());
    }

}