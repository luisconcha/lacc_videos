<?php

namespace LACC\Http\Controllers\Api;

use LACC\Http\Controllers\Controller;
use LACC\Models\User;
use LACC\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Two\User as UserSocial;

class RegisterUsersController extends Controller
{
    /** @var UserRepository */
    private $repository;

    function __construct( UserRepository $repository )
    {
        $this->repository = $repository;
    }

    public function store( Request $request )
    {
        $authorization = $request->header( 'Authorization' );
        $accessToken = str_replace( 'Bearer ', '', $authorization );
        $facebook = \Socialite::driver( 'facebook' );

        /** @var UserSocial $userSocial */
        $userSocial = $facebook->userFromToken( $accessToken );

        $user = $this->repository->findByField( 'email', $userSocial->email )->first();

        if( !$user ) {
            User::unguard();
            $user = $this->repository->create( [
                'name'     => $userSocial->name,
                'email'    => $userSocial->email,
                'thumb'    => $userSocial->avatar,
                'role'     => User::ROLE_CLIENT,
                'verified' => true,
            ] );
            User::reguard();
        }

        return [ 'token' => \Auth::guard( 'api' )->tokenById( $user->id ) ];
    }
}
