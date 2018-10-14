<?php

use systemAPV\Models\Call;
use Faker\Generator as Faker;

$factory->define(Call::class, function (Faker $faker) {
    return [
        'user_id'   => 1,
        'title'     => $faker->unique()->word,
        'body'      => $faker->sentence(),
    ];
});
