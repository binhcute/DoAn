<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => $faker->regexify('[1-9]{1}'),
        'article_name' => $faker->catchPhrase,
        'article_keyword' => $faker->word,
        'article_img' => 'blog.jpg',
        'article_description' => $faker->text($maxNbChars = 255),
        'article_detail' => $faker->text($maxNbChars = 1000),
        'status' => 1,
    ];
});
