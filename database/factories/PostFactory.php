<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Canvas\Post;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Post::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'slug' => $faker->slug,
        'title' => $faker->word,
        'summary' => $faker->word,
        'body' => $faker->word,
        'meta' => json_encode([]),
        'user_id' => null,
    ];
});
