<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'rating'   => $faker->numberBetween(0, 5),
        'category'  => $faker->randomElements(['hotel','alternative','hostel', 'lodge', 'resort', 'guest-house]']),
        'image' => $faker->url,
        'reputation' => $faker->numberBetween(0, 1000),
        'price' => $faker->numberBetween(0, 1000),
        'availability' => $faker->numberBetween(0, 100),
    ];
});
