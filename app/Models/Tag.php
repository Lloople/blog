<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    use Sluggable;

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_tags');
    }

    public function getUrlAttribute()
    {
        return route('tags.show', $this->slug);
    }

    public static function findOrCreateByName($name)
    {
        if (($tag = self::where('name', $name)->first()) !== null) {
            return $tag;
        }

        $tag = new self();

        $tag->name = $name;
        $tag->slug = str_slug($name);

        $tag->save();

        $tag->fresh();

        return $tag;
    }
}
