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
$factory->define( \LACC\Models\User::class, function( Faker\Generator $faker ) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'role'           => \LACC\Models\User::ROLE_ADMIN,
        'verified'       => true,
        'password'       => $password ? : $password = bcrypt( 'secret' ),
        'remember_token' => str_random( 10 ),
    ];
} );
$factory->define( \LACC\Models\Category::class, function( Faker\Generator $faker ) {
    $categoryName = $faker->jobTitle;

    return [
        'name'  => $categoryName,
        'url'   => str_slug( $categoryName ),
        'color' => $faker->unique()->hexColor,
    ];
} );

$factory->define( \LACC\Models\Serie::class, function( Faker\Generator $faker ) {

    return [
        'title'       => $faker->sentence( 3 ),
        'description' => $faker->sentence( 30 ),
        'thumb'       => 'thumb.jpg'
    ];
} );

$factory->define( \LACC\Models\Video::class, function( Faker\Generator $faker ) {

    return [
        'title'       => $faker->sentence( 3 ),
        'description' => $faker->sentence( 30 ),
        'duration'    => rand( 1, 30 ),
        'file'        => 'thumb.jpg',
        'thumb'       => 'thumb.jpg',
        'publish'     => rand( 0, 1 ),
        'completed'   => 1
    ];
} );
