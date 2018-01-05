<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $data = [
            'posts' => Post::published()->visible()->orderBy('published_at', 'DESC')->paginate(10),
        ];

        return view('frontend.posts.index', $data);
    }

    public function show($slug)
    {
        $post = Post::findBySlug($slug);

        if (! $post || $post->published_at->isFuture()) {
            abort(404);
        }

        $data = [
            'post' => $post,
        ];

        return view('frontend.posts.show', $data);
    }
}
