<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(\App\Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'number' => $faker->phoneNumber(),
    ];
});
