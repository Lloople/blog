<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function updateColors($array)
    {
        $this->background = $array['background'] ?? 'white';
        $this->container_background = $array['container_background'] ?? 'grey';
        $this->title = $array['title'] ?? 'black';
        $this->text = $array['text'] ?? 'black';

        $this->menu_item_text = $array['menu_item_text'] ?? 'white';
        $this->menu_item_background = $array['menu_item_background'] ?? 'black';
        $this->menu_item_active_text = $array['menu_item_active_text'] ?? 'black';
        $this->menu_item_active_background = $array['menu_item_active_background'] ?? 'white';

        $this->categories_list_text = $array['categories_list_text'] ?? 'white';
        $this->categories_list_background = $array['categories_list_background'] ?? 'black';

        $this->tags_list_text = $array['tags_list_text'] ?? 'white';
        $this->tags_list_background = $array['tags_list_background'] ?? 'black';
    }

    public function disableOtherThemes()
    {
        \DB::table('themes')->where('id', '!=', $this->id)->update(['selected' => false]);
    }
}
