<?php

namespace LACC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PaypalWebProfile extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = 'paypal_web_profiles';

    protected $fillable = [ 'name', 'logo_url', 'code' ];

    public function rules()
    {
        return [
            'name'     => 'required|min:5|max:255',
            'logo_url' => 'required|url|max:255'
        ];
    }
}