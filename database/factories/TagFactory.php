<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Canvas\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'slug' => '',
        'name' => '',
        'user_id' => null,
    ];
});
