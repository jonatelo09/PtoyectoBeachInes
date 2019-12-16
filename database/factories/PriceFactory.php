<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Price;
use Faker\Generator as Faker;

$factory->define(Price::class, function (Faker $faker) {
	return [
		'temporada_alta' => $faker->randomFloat(2, 5, 150),
		'temporada_baja' => $faker->randomFloat(2, 5, 150),
	];
});
