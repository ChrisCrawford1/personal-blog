<?php

/** @var Factory $factory */

use Canvas\Models\Post;
use Canvas\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

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
        'id'      => $faker->uuid,
        'slug'    => $faker->slug,
        'title'   => $faker->word,
        'summary' => $faker->word,
        'body'    => $faker->word,
        'meta'    => json_encode([]),
        'user_id' => factory(User::class)->create()->id,
    ];
});
