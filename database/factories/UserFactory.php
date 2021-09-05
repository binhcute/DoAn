<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'username' => $faker->username,
        'phone' => $faker->regexify('0[1-9]{9}'),
        'address' => $faker->address,
        'gender' => $faker->regexify('[0-1]{1}'),
        'avatar' => '20210727174952.jpg',
        'email' => $faker->unique()->email,
        'status' => 1,
        'level' => 1,
        'password' => '$2y$10$.o8v59/En1r8xq9xFOCg6embp91DxT3YolbI7ws.2axnd5TdLiNpK', // password
        'remember_token' => Str::random(10),
    ];
});
