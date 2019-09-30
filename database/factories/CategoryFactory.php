<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Category\Model;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
      'url' => $faker->word,
      'title' => $faker->word,
      'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
