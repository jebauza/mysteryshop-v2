<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Establishment;
use App\Models\EstablishmentType;
use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Establishment::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'establishment_type_id' => factory(EstablishmentType::class)->create()->id,
        'client_id' => factory(Client::class)
    ];
});
