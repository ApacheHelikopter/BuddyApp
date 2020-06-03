<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Buddy;
use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Buddy::class, function (Faker $faker) {
    static $buddy_id = 5;

    return [
        'user_id' => $buddy_id++,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'class' => '3IMD',
        'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'email_verified_at' => now(),
        'profile_picture' => "default.png",
        'bio' => $faker->realText(50),
        'remember_token' => Str::random(10),
    ];
});
