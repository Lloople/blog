<?php

namespace App\Models;

use App\Traits\Sluggable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable, Searchable {
        searchable as scoutSearchable;
    }

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

    public function getBodyRawAttribute()
    {
        return strip_tags($this->body_markdown);
    }

    public function getUrlAttribute()
    {
        return route('posts.show', $this->slug);
    }

    public function isVisible()
    {
        return $this->attributes['visible'];
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

    public function scopeSearchLike($query, $search)
    {
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

    public function searchable()
    {
        if ($this->isVisible() && $this->published_at->isPast()) {
            $this->scoutSearchable();
        }
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'published_at' => $this->published_at,
        ];
    }
}
