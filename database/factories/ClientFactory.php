<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use App\Models\Enterprise;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'contract_number' => Str::random(8),
    ];
});

//use factory(App\User::class, 5)->states('withEnterprise')->make();
$factory->state(Client::class, 'withEnterprise', function ($faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'contract_number' => Str::random(8),
        'enterprise_id' => factory(Enterprise::class)->create()->id
    ];
});

