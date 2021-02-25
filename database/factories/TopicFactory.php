<?php

/** @var Factory $factory */

use Canvas\Models\Topic;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'id'      => $faker->uuid,
        'slug'    => '',
        'name'    => '',
        'user_id' => null,
    ];
});
