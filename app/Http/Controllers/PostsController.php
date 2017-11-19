<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($slug)
    {
        if (! $post = Post::findBySlug($slug)) {
            abort(404);
        }
    }
}
