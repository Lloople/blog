<?php

use App\Models\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $color = $faker->colorName;

    return [
        'name' => $color,
        'slug' => strtolower($color),
    ];

});
