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
        'thumb'          => env( 'USER_NO_THUMB' )
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
        'thumb'       => env( 'SERIE_NO_THUMB' )
    ];
} );

$factory->define( \LACC\Models\Video::class, function( Faker\Generator $faker ) {

    return [
        'title'       => $faker->sentence( 3 ),
        'description' => $faker->sentence( 30 ),
        'duration'    => rand( 1, 30 ),
        'file'        => 'thumb.jpg',
        'thumb'       => env( 'VIDEO_NO_THUMB' ),
        'publish'     => rand( 0, 1 ),
        'completed'   => 0
    ];
} );

$factory->define( \LACC\Models\Plans::class, function( Faker\Generator $faker ) {
    $arrDuration = [
        1 => \LACC\Models\Plans::DURATION_YEARLY,
        2 => \LACC\Models\Plans::DURATION_MONTHLY
    ];

    return [
        'name'        => $faker->sentence( 3 ),
        'description' => $faker->paragraph( 5 ),
        'value'       => $faker->randomFloat( 2, 50, 100 ),
        'duration'    => $faker->randomKey( $arrDuration )
    ];
} );

$factory->define( \LACC\Models\Order::class, function( Faker\Generator $faker ) {
    return [
        'value' => $faker->randomFloat( 2, 50, 100 )
    ];
} );

$factory->define( \LACC\Models\PaypalWebProfile::class, function( Faker\Generator $faker ) {
    return [
        'name'     => $faker->name,
        'logo_url' => $faker->imageUrl( 200, 200 ),
        'code'     => str_random()
    ];
} );

//$factory->define( \LACC\Models\Subscription::class, function( Faker\Generator $faker ) {
//    return [];
//} );