<?php

namespace App\Traits;

trait Sluggable
{

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

}