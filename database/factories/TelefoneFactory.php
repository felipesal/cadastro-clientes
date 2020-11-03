<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Telefone;
use Faker\Generator as Faker;

$factory->define(Telefone::class, function (Faker $faker) {
    return [
        'numero' => $faker->phoneNumber
    ];
});
