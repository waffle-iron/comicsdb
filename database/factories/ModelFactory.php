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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Creator::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->numberBetween(999999, 9999999),
        'uuid' => $faker->uuid,
        'firstname' => $faker->firstNameMale,
        'lastname' => $faker->lastName,
        'gender' => 'male',
        'birthdate' => $faker->dateTimeThisCentury,
        'deathdate' => $faker->dateTimeThisDecade,
        'city' => $faker->city,
        'country' => $faker->country,
        'email' => $faker->email,
        'twitter' => $faker->text,
        'website' => $faker->url,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});

$factory->define(\App\Models\Issue::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->numberBetween(999999, 9999999),
        'uuid' => $faker->uuid,
        'volume_id' => $faker->numberBetween(1, 10),
        'number' => $faker->numberBetween(1, 200),
        'name' => $faker->text,
        'intro' => $faker->text,
        'cover_date' => $faker->dateTime,
        'store_date' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
