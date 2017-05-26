<?php
/**
 * File: ThumbUploads.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 26/05/17
 * Time: 00:11
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\Media;

use Illuminate\Http\UploadedFile;

trait ThumbUploads
{
    public function uploadThumb( $id, UploadedFile $file )
    {
        $model = $this->find( $id );
        $name = $this->upload( $model, $file );

        if( $name ) {
            $model->thumb = $name;
            $model->save();
        }

        return $model;
    }

}