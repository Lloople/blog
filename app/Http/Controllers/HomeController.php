<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data = [
            'posts' => Post::published()->visible()->paginate(25),
            'postsFeatured' => Post::featured()->take(4)->get()
        ];

        return view('pages.home', $data);
    }
}
