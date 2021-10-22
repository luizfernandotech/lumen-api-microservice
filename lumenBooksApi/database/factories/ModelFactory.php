<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

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

$factory->define(\App\Book::class, function (Faker $faker) {
    return [
        'title' => $gender = $faker->sentences(3, true),
        'description' => $gender = $faker->sentences(3, true),
        'price' => $faker->randomFloat(2, 10, 100),
        'author_id' => $faker->numberBetween(1, 50)
    ];
});
