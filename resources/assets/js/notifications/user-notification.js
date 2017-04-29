module.exports = {
    init(){
        if ( window.Laravel.userId !== null ) {
            window.Echo.private('LACC.Models.User.' + window.Laravel.userId)
                .notification(notification => {
                    generateTemplateNotification(
                        'User <strong>' + notification.user.name + '</strong> has been successfully registered',
                        'success',
                        9000
                    );
                });
        }
    }
};


function generateTemplateNotification( message, type, delay ) {
    window.$$.notify({
        icon   : 'glyphicon glyphicon-warning-sign',
        title  : 'LACC-Videos',
        message: message
    },
        {
            type   : type,
            delay  : delay,
            animate: {
                enter: 'animated lightSpeedIn',
                exit : 'animated lightSpeedOut'
            },
        });
}