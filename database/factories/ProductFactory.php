<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'cate_id' => $faker->regexify('[1-8]{1}'),
        'user_id' => $faker->regexify('[1-9]{1}'),
        'port_id' => $faker->regexify('[1-8]{1}'),
        'product_name' => $faker->name,
        'product_img' => '20210726090152.jpg',
        'product_img_hover' => '20210726090152.jpg',
        'product_price' => $faker->numberBetween($min = 15000, $max = 1000000),
        'product_color' =>$faker->colorName,
        'product_description' => $faker->text($maxNbChars = 255),
        'product_quantity' => $faker->numerify('###'),
        'product_keyword' => $faker->word,
        'status' => 1,
    ];
});
