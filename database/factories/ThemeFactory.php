<?php

use App\Models\Theme;
use Faker\Generator as Faker;

$factory->define(Theme::class, function (Faker $faker) {
    return [
        'name'                        => 'Default Theme',
        'selected'                    => true,
        'background'                  => 'grey-lighter',
        'container_background'        => 'white',
        'menu_item_text'              => 'black',
        'menu_item_background'        => 'white',
        'menu_item_active_text'       => 'white',
        'menu_item_active_background' => 'black',
        'categories_list_text'        => 'white',
        'categories_list_background'  => 'black',
        'tags_list_text'              => 'white',
        'tags_list_background'        => 'black',
        'title'                       => 'black',
        'text'                        => 'black',
    ];
});
