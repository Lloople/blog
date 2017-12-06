<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{

    public function index()
    {
        $data = [
            'posts' => Post::published()->visible()->paginate(10),
        ];

        return view('frontend.posts.index', $data);
    }

    public function show($slug)
    {
        if (! $post = Post::findBySlug($slug)) {
            abort(404);
        }

        $data = [
            'post' => $post,
        ];

        return view('frontend.posts.show', $data);
    }
}
