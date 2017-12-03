<?php

namespace App\Http\ViewComposers;

use App\Models\Post;
use Illuminate\View\View;

class SidebarFeaturedPostsViewComposer
{

    public function compose(View $view)
    {
        $view->with('postsFeatured', Post::featured()->take(4)->get());
    }

}
