<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{

    public function index()
    {
        $data = [
            'posts' => Post::published()->visible()->paginate(25),
        ];

        return view('posts.index', $data);
    }

    public function show($slug)
    {
        if (! $post = Post::findBySlug($slug)) {
            abort(404);
        }

        $data = [
            'post' => $post,
        ];

        return view('posts.show', $data);
    }
}
