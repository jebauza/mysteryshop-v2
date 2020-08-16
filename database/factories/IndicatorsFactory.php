<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Indicator;
use Faker\Generator as Faker;

$factory->define(Indicator::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
    ];
});



