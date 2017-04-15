<?php
namespace LACC\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class DefaultResetPasswordNotification extends ResetPassword
{

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail( $notifiable )
    {
        return (new MailMessage)
          ->subject('LACC-Videos Password reset')
          ->line('You are receiving this email because we received a password reset request for your account.')
          ->action('Reset my password', route('password.reset', $this->token))
          ->line('If you did not request a password reset, please disregard this email.');
    }
}
