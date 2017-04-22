<?php

namespace LACC\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Serie extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'title',
        'description',
        'thumb'
    ];

    public function rules()
    {
        $idSeries = ( \Request::segment( 3 ) ) ? : null;

        return [
            'title'       => 'required|min:5|max:256|unique:series,title,' . $idSeries,
            'description' => 'required',
        ];
    }

    public function video()
    {
        return $this->hasMany( Video::class );
    }
}
