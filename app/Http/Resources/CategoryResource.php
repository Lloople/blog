<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CategoryResource extends Resource
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
            'url_edit' => route('backend.categories.edit', $this),
            'url_delete' => route('backend.categories.destroy', $this),
            'name' => $this->name,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
            'active' => $this->active,
        ];
    }
}
