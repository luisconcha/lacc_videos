<?php

namespace LACC\Http\Middleware;

use Closure;
use LACC\Exceptions\SubscriptionInvalidException;

class CheckSubscriptions
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws SubscriptionInvalidException
     */
    public function handle( $request, Closure $next )
    {
        $user = $request->user( 'api' );
        $valid = $user->hasSubscriptionValid();
        
        if( !$valid ) {
            throw new SubscriptionInvalidException( 'User is not a valid subscription' );
        }

        return $next( $request );
    }
}
