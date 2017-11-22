<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Tag::class, function (Faker $faker) {
    $color = $faker->colorName;

    return [
        'name' => $color,
        'slug' => strtolower($color),
    ];

});
