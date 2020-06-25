<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Canvas\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'id'      => $faker->uuid,
        'slug'    => '',
        'name'    => '',
        'user_id' => null,
    ];
});
