<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;

class TagsController extends Controller
{
    public function index()
    {
        $data = [
            'tags' => Tag::orderBy('name')->get(),
        ];

        return view('frontend.tags.index', $data);
    }

    public function show($slug)
    {
        $data = [
            'tag' => $slug,
            'posts' => Post::published()->visible()->whereHasTag($slug)->paginate(25),
        ];

        return view('frontend.tags.show', $data);
    }
}
