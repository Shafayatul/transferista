<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $password ?: $password = bcrypt('12345678'), // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Project::class, function (Faker $faker) {
    
    return [
        'project_owner_id' => rand(1,10),
        'transferista_id' => rand(1,10),
        'origin_address' => $faker->address,
        'origin_zip' => $faker->postcode,
        'origin_town' => $faker->city,
        'origin_country' => $faker->country,
        'origin_lng' => $faker->longitude,
        'origin_lat' => $faker->latitude,
        'destination_address' => $faker->address,
        'destination_zip' => $faker->postcode,
        'destination_town' => $faker->city,
        'destination_country' => $faker->country,
        'destination_lng' => $faker->longitude,
        'destination_lat' => $faker->latitude,
        'project_title' => $faker->jobTitle,
        'project_description' => $faker->paragraph,
        'project_size' => rand(5, 20),
        'project_amount' => rand(1000,9000),
        'project_status' => rand(0,4),
        'delivery_date' => date('Y-m-d'),
        'time_for_delivery' => rand(6,12).'-'.rand(13,23),
        'estimated_cost' => rand(1000,9000),
    ];
});
