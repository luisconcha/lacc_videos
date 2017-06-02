<?php

namespace LACC\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Video extends Model implements Transformable
{
    use TransformableTrait;

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

    public function rules()
    {
        $idVideo = ( \Request::segment( 3 ) ) ? : null;

        return [
            'title'       => 'required|min:5|max:256|unique:videos,title,' . $idVideo,
            'description' => 'required|min:5',
            'thumb'        => 'image|max:1024',
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