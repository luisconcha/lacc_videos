<?php
/**
 * File: JWTProvider.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 04/06/17
 * Time: 14:57
 * Project: lacc_videos
 * Copyright: 2017
 */


namespace LACC\Auth;

use Dingo\Api\Auth\Provider\Authorization;
use Dingo\Api\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWT;

class JWTProvider extends Authorization
{
    /** @var  JWT */
    private $jwt;

    function __construct( JWT $jwt )
    {
        $this->jwt = $jwt;
    }

    public function getAuthorizationMethod()
    {
        return 'bearer';
    }

    public function authenticate( Request $request, Route $route )
    {
        try {
            return \Auth::guard( 'api' )->authenticate();
        } catch( AuthenticationException $exception ) {
            //Apply refreshToken
            $this->refreshToken();

            return \Auth::guard( 'api' )->user();
        }
    }

    protected function refreshToken()
    {
        $token = $this->jwt->parseToken()->refresh();
        $this->jwt->setToken( $token );
    }


}