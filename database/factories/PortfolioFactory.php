<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Portfolio;
use Faker\Generator as Faker;

$factory->define(Portfolio::class, function (Faker $faker) {
    return [
        'user_id' => $faker->regexify('[1-9]{1}'),
        'port_name' => $faker->catchPhrase,
        'port_origin' => $faker->country,
        'port_avatar' => '20210726090104.png',
        'port_img' => '20210726090104.jpg',
        'port_description' => $faker->text($maxNbChars = 255),
        'status' => 1,
    ];
});
