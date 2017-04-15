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
$factory->define( \LACC\Models\User::class, function ( Faker\Generator $faker ) {
    static $password;

    return [
      'name'           => $faker->name,
      'email'          => $faker->unique()->safeEmail,
      'role'           => \LACC\Models\User::ROLE_CLIENT,
      'password'       => $password ? : $password = bcrypt( 'secret' ),
      'remember_token' => str_random( 10 ),
    ];
} );
$factory->define( \LACC\Models\Category::class, function ( Faker\Generator $faker ) {
    return [
      'name'  => $faker->jobTitle,
      'color' => $faker->unique()->rgbColor,
    ];
} );