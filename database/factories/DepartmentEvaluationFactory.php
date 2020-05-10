<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Department;
use Faker\Generator as Faker;
use App\Models\DepartmentEvaluation;

$factory->define(DepartmentEvaluation::class, function (Faker $faker) {
    return [
        'date' => $faker->date(),
        'time' => $faker->time('H:i'),
        'comment' => $faker->text(rand(50,500)),
        'employee_name' => $faker->name,
        'department_id' => factory(Department::class)->create()->id,
        'user_id' => factory(User::class)->create()->id
    ];
});
