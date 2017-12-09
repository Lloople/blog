<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Sluggable;

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

    public function scopeSearchLike($query, $search) {
        return $query->where(function ($post) use ($search) {
            return $post->where('title', 'like', "%{$search}%")
                ->orWhere('published_at', 'like', "%{$search}%")
                ->orWhere('body', 'like', "%{$search}%")
                ->orWhereHas('tags', function ($tags) use ($search) {
                    return $tags->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('category', function ($category) use ($search) {
                    return $category->where('name', 'like', "%{$search}%");
                });
        });
    }

    public function syncTags($rawTags)
    {
        $tags = collect(explode(', ', $rawTags))->map(function ($rawTag) {
            $tag = Tag::findOrCreateByName(trim($rawTag));

            return $tag;

        });

        $this->tags()->sync($tags->pluck('id')->toArray());
    }

}
