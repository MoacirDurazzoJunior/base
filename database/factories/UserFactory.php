<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    $name = $faker->unique()->name;
    $login = strtolower( str_replace('..','.', str_replace(' ','.', $name) ) );
    return [
        'id' => $faker->unique()->uuid,
        'nome' => $name,
        'email' => $login . '@' . $faker->domainName,
        'login' => $login,
        'email_verified_at' => now(),
        'password' => Hash::make('cejam2019'),
        'remember_token' => str_random(10),
    ];
});
