<?php

use App\Models\Post;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'body' => $faker->sentence(10),
        'category_id' => factory(Category::class)->create(),
        'visible' => true,
        'published_at' => $faker->dateTime(),
    ];
});
