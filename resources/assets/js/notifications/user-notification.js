module.exports = {
    init(){
        if ( window.Laravel.userId !== null ) {
            window.Echo.private('LACC.Models.User.' + window.Laravel.userId)
                .notification(notification => {
                    console.log('Obj: ', notification.user.name);
                    generateTemplateNotification(
                        'User <strong>+ notification.user.name +</strong> has been successfully registered',
                        'success',
                        10000
                    );
                });
        }
    }
};

function generateTemplateNotification( message, type, delay ) {
    window.$.notify(
        { message: message },
        {
            type   : type,
            delay  : delay,
            animate: {
                enter: 'animated lightSpeedIn',
                exit : 'animated lightSpeedOut'
            },
        });
}