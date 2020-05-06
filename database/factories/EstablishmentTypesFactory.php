<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EstablishmentType;
use Faker\Generator as Faker;

$factory->define(EstablishmentType::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
