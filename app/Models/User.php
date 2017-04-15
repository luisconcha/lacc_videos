<?php
namespace LACC\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LACC\Notifications\DefaultResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN  = 1;
    const ROLE_CLIENT = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'email',
      'role',
      'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password',
      'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification( $token )
    {
        $this->notify( new DefaultResetPasswordNotification( $token ) );
    }
}
