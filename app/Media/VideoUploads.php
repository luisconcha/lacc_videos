<?php
/**
 * File: VideoUploads.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 26/05/17
 * Time: 00:11
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\Media;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;

trait VideoUploads
{
    use Uploads;

    public function uploadFile( $id, UploadedFile $file )
    {
        $model = $this->find( $id );
        $name = $this->upload( $model, $file, 'file' );

        if( $name ) {
            $this->deleteFileOld( $model );
            $model->file = $name;
            $model->save();
        }

        return $model;
    }

    public function deleteFileOld( $model )
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();

        if( $storage->exists( $model->file_relative ) ) {
            $storage->delete( $model->file_relative );
        }
    }
}