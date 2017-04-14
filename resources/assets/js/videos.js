function getObjectPusher( module_name,className , chanel, autoHideDelay ) {
    var pusher = new Pusher( '73f6c722dc503be4df84', {
        encrypted: true
    } );

    var notificationsChannel = pusher.subscribe( module_name );

    notificationsChannel.bind( chanel, function ( notification ) {
        var message = notification.message;
        //seed https://notifyjs.com/
        $.notify( message, {
            className: className,
            autoHide: true,
            autoHideDelay: autoHideDelay,
        } );
    } );
}