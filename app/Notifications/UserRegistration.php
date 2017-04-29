<?php

namespace LACC\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use LACC\Models\User;

class UserRegistration extends Notification
{
    use Queueable;
    /**
     * @var User
     */
    private $user;

    /**
     * UserRegistration constructor.
     * @param User $user
     */
    public function __construct( User $user )
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via( $notifiable )
    {
        return [ 'broadcast' ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail( $notifiable )
    {
        return ( new MailMessage )
            ->line( 'The introduction to the notification.' )
            ->action( 'Notification Action', url( '/' ) )
            ->line( 'Thank you for using our application!' );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray( $notifiable )
    {
        $user = $this->user->toArray();
        unset( $user[ 'verification_token' ] );
        unset( $user[ 'updated_at' ] );
        unset( $user[ 'role' ] );
        unset( $user[ 'verified' ] );
        unset( $user[ 'id' ] );

        return [
            'user' => $user
        ];
    }
}
