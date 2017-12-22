<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Str;

class ThemeResource extends Resource
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
            'url_edit' => route('backend.themes.edit', $this),
            'url_delete' => route('backend.themes.destroy', $this),
            'name' => $this->name,
            'selected' => $this->selected,
            'created_at' => $this->created_at->format('Y-m-d H:i')
        ];
    }
}
