<?php

/** @var Factory $factory */

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'id'        => $faker->uuid,
        'name'      => $faker->name,
        'email'     => $faker->email,
        'username'  => $faker->userName,
        'password'  => $faker->word,
        'role'      => 3,
    ];
});
