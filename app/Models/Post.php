<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $dates = ['published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags');
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

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

}
