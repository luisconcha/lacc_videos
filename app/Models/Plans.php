<?php

namespace LACC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Plans extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [ 'name', 'description', 'value', 'duration' ];

    CONST DURATION_YEARLY = '1';
    CONST DURATION_MONTHLY = '2';

    public function rules()
    {
        $idPlans = ( \Request::segment( 3 ) ) ? : null;

        return [
            'name'        => 'required|min:5|max:255|unique:plans,name,' . $idPlans,
            'description' => 'min:5|max:1000',
            'duration'    => 'required',
            'value'       => 'required'
        ];
    }
}