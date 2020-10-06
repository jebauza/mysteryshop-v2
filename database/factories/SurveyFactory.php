<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Survey;
use Faker\Generator as Faker;

$factory->define(Survey::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});



