<?php

namespace LACC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LACC\Media\VideoPaths;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Video extends Model implements Transformable
{
    use TransformableTrait, VideoPaths, SoftDeletes;


    protected $fillable = [
        'title',
        'description',
        'duration',
        'file',
        'thumb',
        'completed',
        'publish',
        'serie_id'
    ];

    protected $casts = [
        'completed' => 'boolean'
    ];

    public function rules()
    {
        $idVideo = ( \Request::segment( 3 ) ) ? : null;

        return [
            'title'       => 'required|min:5|max:256|unique:videos,title,' . $idVideo,
            'duration'    => 'required|integer|min:1',
            'description' => 'required|min:5',
            'thumb'       => 'image|max:1024',
            'file'        => 'mimetypes:video/mp4,video/avi',
        ];
    }


    public function serie()
    {
        return $this->belongsTo( Serie::class );
    }

    public function categories()
    {
        return $this->belongsToMany( Category::class );
    }

}