<?php
/**
 * File: Uploads.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 03/06/17
 * Time: 13:35
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\Media;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;

trait Uploads
{
    public function upload( $model, UploadedFile $file, $type )
    {
//        /** @var FilesystemAdapter $storage */
//        $storage = $model->getStorage();
//
//        $name = md5( time() . "{$model->id}-{$file->getClientOriginalName()}" ) . ".{$file->guessExtension()}";
//        $result = $storage->putFileAs( $model->{"{$type}_folder_storage"}, $file, $name );
//
//        return $result ? $name : $result;
    }
}