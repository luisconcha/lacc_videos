<?php

namespace LACC\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Subscription extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'expires_at',
        'canceled_at',
        'plan_id',
        'order_id'
    ];

    public function order()
    {
        return $this->belongsTo( Order::class );
    }

    public function plan()
    {
        return $this->belongsTo( Plans::class );
    }

    public function isExpired()
    {
        $expiresAt = new Carbon( $this->expires_at );
        
        //lt: determina se a instancia é menor com a data passada como paramétro
        return $expiresAt->lt( new Carbon() ) ? true : false;
    }


}
