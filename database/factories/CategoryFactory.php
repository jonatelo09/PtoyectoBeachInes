<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
	return [
		'name_cat' => ucfirst($faker->word),
		'description' => $faker->sentence(10),
	];
});
