<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Larabook\Users\User::class, function ($faker) {
    return [
        'username' => str_random(10),
        'email' => $faker->email,
        'password' => str_random(10),
    ];
});

$factory->define(Larabook\Statuses\Status::class, function ($faker) {
    return [
        'body' => $faker->text,
    ];
});
