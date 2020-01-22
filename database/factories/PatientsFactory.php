<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'gender' => $faker->randomElement(['Male', 'Female', 'Others']), // password
        'phone_number' => $faker->phoneNumber,
        'doctors_id' => $faker->randomElement([1,2,3]),
    ];
});
