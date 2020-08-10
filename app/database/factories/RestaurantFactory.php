<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
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

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'status' => $faker->numberBetween($min = 1, $max = 2),
        'store_name' => $faker->name,
        'store_infomation' => $faker->realText(100),
        'prefecture_id' => $faker->numberBetween($min = 1, $max = 46),
        'city' => $faker->city,
        'street_address' => $faker->streetAddress,
        'image_name' => $faker->randomNumber() ."jpg",
        'high_budget' => $faker->numberBetween($min = 100, $max = 500),
        'low_budget' => $faker->numberBetween($min = 600, $max = 1000),
        'latitude' => 35 . '.' .$faker->numberBetween($min = 630468, $max = 861743),
        'longitude' => 139 . '.' .$faker->numberBetween($min = 635381, $max = 883947),
        'category_id_1' => $faker->numberBetween($min = 1, $max = 16),
        'category_id_2' => $faker->numberBetween($min = 1, $max = 16),
        'category_id_3' => $faker->numberBetween($min = 1, $max = 16),
        'category_id_4' => $faker->numberBetween($min = 1, $max = 16),
        'category_id_5' => $faker->numberBetween($min = 1, $max = 16),

    ];
});