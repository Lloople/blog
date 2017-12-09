<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'url_edit' => route('posts.edit', $this),
            'url_delete' => route('posts.destroy', $this),
            'title' => Str::words($this->title, 5),
            'category' => $this->category->name,
            'tags' => $this->tags->take(3)->implode('name', ', '),
            'published_at' => $this->published_at->format('Y-m-d H:i')
        ];
    }
}
