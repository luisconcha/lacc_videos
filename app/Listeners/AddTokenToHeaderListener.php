<?php

namespace LACC\Listeners;

use Dingo\Api\Event\ResponseWasMorphed;
use Tymon\JWTAuth\JWT;

class AddTokenToHeaderListener
{
    /** @var  JWT */
    private $jwt;

    public function __construct( JWT $jwt )
    {
        $this->jwt = $jwt;
    }

    /**
     * @param ResponseWasMorphed $event
     */
    public function handle( ResponseWasMorphed $event )
    {
        $token = $this->jwt->getToken();
        if( $token ) {
            $event->response->header( 'Authorization', "Bearer {$token->get()}" );
        }
    }
}
