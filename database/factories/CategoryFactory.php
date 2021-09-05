<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'user_id' => $faker->regexify('[1-9]{1}'),
        'cate_name' => $faker->catchPhrase,
        'cate_img' => '20210725174259.jpg',
        'cate_description' => $faker->text($maxNbChars = 255),
        'status' => 1,
    ];
});
