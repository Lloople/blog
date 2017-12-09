<?php

namespace App\ViewModels;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Carbon;

class PostDetailViewModel
{

    public $post;
    public $title;
    public $action;
    public $method;

    public function __construct(Post $post)
    {
        $this->post = $post;

        $this->published_at = $post->exists
            ? $post->published_at->format('Y-m-d\TH:i')
            : Carbon::now()->format('Y-m-d\TH:i');

        $this->title = $post->exists
            ? "Edit Post: {$this->post->title}"
            : "Create Post";

        $this->action = $post->exists
            ? route('backend.posts.edit', $this->post)
            : route('backend.posts.store');

        $this->method = $post->exists
            ? 'PATCH'
            : 'POST';

        $this->categories = Category::select('id', 'name')->get();
    }
}