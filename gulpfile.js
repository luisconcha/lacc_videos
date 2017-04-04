var elixir = require( 'laravel-elixir' );

elixir( function ( mix ) {

    mix.styles( [
        '../../../node_modules/bootstrap/dist/css/bootstrap.css',
        '../../../node_modules/font-awesome/css/font-awesome.css',
        'videos.css',
    ], 'public/css/videos.css' );

    mix.scripts( [
        '../../../node_modules/jquery/dist/jquery.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.js',
        'videos.js'
    ], 'public/js/videos.js' );

    // mix.version( [ 'css/videos.css', 'js/videos.js' ] );
    //
    mix.copy( 'node_modules/font-awesome/fonts', 'public/fonts' );
    // mix.copy( 'resources/assets/images', 'public/assets/images' );

} );
