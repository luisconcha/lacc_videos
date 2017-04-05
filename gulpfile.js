var elixir = require( 'laravel-elixir' );

elixir( function ( mix ) {

    mix.styles( [
        '../../../node_modules/bootstrap/dist/css/bootstrap.css',
        '../../../node_modules/font-awesome/css/font-awesome.css',
        '../../../resources/assets/css/ionicons.min.css',
        '../../../resources/assets/theme_adminTE/css/morris/morris.css',
        '../../../resources/assets/theme_adminTE/css/jvectormap/jquery-jvectormap-1.2.2.css',
        '../../../resources/assets/theme_adminTE/css/datepicker/datepicker3.css',
        '../../../resources/assets/theme_adminTE/css/daterangepicker/daterangepicker-bs3.css',
        '../../../resources/assets/theme_adminTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        '../../../resources/assets/theme_adminTE/css/AdminLTE.css',
        'videos.css',
    ], 'public/css/videos.css' );

    mix.scripts( [
        '../../../resources/assets/theme_adminTE/js/jquery.js',
        '../../../resources/assets/theme_adminTE/js/bootstrap.js',
        '../../../resources/assets/theme_adminTE/js/jquery-ui.min.js',
        '../../../resources/assets/theme_adminTE/js/raphael-min.js',
        '../../../resources/assets/theme_adminTE/js/plugins/morris/morris.js',
        '../../../resources/assets/theme_adminTE/js/plugins/sparkline/jquery.sparkline.js',
        '../../../resources/assets/theme_adminTE/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        '../../../resources/assets/theme_adminTE/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        '../../../resources/assets/theme_adminTE/js/plugins/jqueryKnob/jquery.knob.js',
        '../../../resources/assets/theme_adminTE/js/plugins/daterangepicker/daterangepicker.js',
        '../../../resources/assets/theme_adminTE/js/plugins/datepicker/bootstrap-datepicker.js',
        '../../../resources/assets/theme_adminTE/js/plugins/iCheck/icheck.min.js',
        '../../../resources/assets/theme_adminTE/js/AdminLTE/app.js',
        '../../../resources/assets/theme_adminTE/js/AdminLTE/demo.js',
        'videos.js'
    ], 'public/js/videos.js' );

    // mix.version( [ 'css/videos.css', 'js/videos.js' ] );
    //
    mix.copy( 'resources/assets/theme_adminTE/fonts', 'public/fonts' );
    mix.copy( 'resources/assets/theme_adminTE/img', 'public/img' );

} );
