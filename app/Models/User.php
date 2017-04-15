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

    public static function generatePassword( $password = null )
    {
        return !$password ? bcrypt( str_random( 6 ) ) : bcrypt( $password );
    }

    public function rules()
    {
        $idUser = ( \Request::segment( 3 ) ) ? : null;

        return [
          'name'  => 'required|min:5|max:100',
          'email' => 'required|email|unique:users,email,' . $idUser,
          //'password'     => $passRules,
        ];
    }
}
