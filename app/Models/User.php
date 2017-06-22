<?php

namespace LACC\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LACC\Media\UserPaths;
use LACC\Notifications\DefaultResetPasswordNotification;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, UserPaths, SoftDeletes;

    const ROLE_ADMIN = 1;
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
        'verified',
        'password',
        'thumb'
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
        ];
    }

    public function rulesPassword()
    {
        $idUser = ( \Request::segment( 3 ) ) ? : null;
        if( $idUser ) {
            $passRules = 'confirmed';
        } else {
            $passRules = 'required|confirmed';
        }

        return [
            'password' => $passRules . '|min:6|max:16',
        ];
    }


    /**
     * @return int|mixed
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    public function getJWTCustomClaims()
    {
        return [
            'user' => [
                'id'    => $this->id,
                'name'  => $this->name,
                'email' => $this->email
            ]
        ];
    }
}
