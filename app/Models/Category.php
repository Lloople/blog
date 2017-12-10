<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use Sluggable;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getUrlAttribute()
    {
        return route('categories.show', $this->slug);
    }

    public function getVisiblePosts()
    {
        return $this->posts()->published()->visible()->orderBy('published_at', 'DESC')->get();
    }
}
