<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\IndicatorGroup;
use Faker\Generator as Faker;

$factory->define(IndicatorGroup::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
    ];
});



