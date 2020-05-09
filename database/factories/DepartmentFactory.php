<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Department;
use App\Models\Establishment;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'establishment_id' => factory(Establishment::class)->create()->id
    ];
});
