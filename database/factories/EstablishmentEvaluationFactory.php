<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Establishment;
use Faker\Generator as Faker;
use App\Models\EstablishmentEvaluation;
use App\User;

$factory->define(EstablishmentEvaluation::class, function (Faker $faker) {
    return [
        'date' => $faker->date(),
        'time' => $faker->time('H:i'),
        'comment' => $faker->text(rand(50,500)),
        'employee_name' => $faker->boolean ? $faker->name : '',
        'establishment_id' => factory(Establishment::class)->create()->id,
        'user_id' => factory(User::class)->create()->id
    ];
});
