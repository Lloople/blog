<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Sluggable, Searchable;

    public $dates = ['published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags');
    }

    public function getBodyMarkdownAttribute()
    {
        return (new \Parsedown())->text($this->body);
    }

    public function getUrlAttribute()
    {
        return route('posts.show', $this->slug);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', date('Y-m-d H:i:s'));
    }

    public function scopeVisible($query)
    {
        return $query->where('visible', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeWhereHasTag($query, ...$tags)
    {
        return $query->whereHas('tags', function ($queryTags) use ($tags) {
            return $queryTags->whereIn('slug', $tags);
        });
    }



}
