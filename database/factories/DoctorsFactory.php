<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => 'doctor@12345', // password
        'registration' => $faker->bankAccountNumber,
        'phone_number' => $faker->phoneNumber,
        'specialization' => $faker->word(2),
        'patients_id' => $faker->randomElement([1,2,3,4,5]),
    ];
});
