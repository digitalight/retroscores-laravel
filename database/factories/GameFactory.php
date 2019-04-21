<?php

use Faker\Generator as Faker;

$factory->define(App\Game::class, function (Faker $faker) {
    return [
    	'system_id' => $faker->numberBetween(1,3),
        'title' => $faker->word,
        'released' => $faker->numberBetween(1989,2001)
    ];
});
