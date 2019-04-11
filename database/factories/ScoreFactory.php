<?php

use Faker\Generator as Faker;

$factory->define(App\Score::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,3),
        'game_id' => $faker->numberBetween(1,10),
        'score' => $faker->numberBetween(1000,999999)
    ];
});
