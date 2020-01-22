<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Prescription::class, function (Faker $faker) {
    $medicines = $faker->randomElements(['Azitromicine','Paracetamol','Digene','Dirtyu','Forex','Scorel']);
    return [
        //
        'doctors_id' => $faker->randomElement([1,2,3,4,5]),
        'patients_id' => $faker->randomElement([1,2,3]),
        //'medicine' => $faker->word(2),
        'medicine' => implode(",",$medicines),
        'diagnosis' => $faker->sentence(50),
        'advice' => $faker->sentence(60),
        'symptoms' => $faker->sentence(6),
    ];
});
