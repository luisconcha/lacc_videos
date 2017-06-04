<?php

namespace LACC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LACC\Media\SeriePaths;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Serie extends Model implements Transformable
{
    use TransformableTrait, SeriePaths, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'thumb'
    ];

    public function rules()
    {
        $idSeries = ( \Request::segment( 3 ) ) ? : null;

        $rulesThumbFile = 'image|max:1024';
        $rulesThumbFile = !$idSeries ? "required|$rulesThumbFile" : 'image|max:1024';

        return [
            'title'       => 'required|min:5|max:256|unique:series,title,' . $idSeries,
            'description' => 'required',
            'thumb_file'  => $rulesThumbFile
        ];
    }

    public function video()
    {
        return $this->hasMany( Video::class );
    }
}
