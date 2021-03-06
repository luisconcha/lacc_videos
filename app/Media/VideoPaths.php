<?php
/**
 * File: VideoPaths.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 25/05/17
 * Time: 23:15
 * Project: lacc_videos
 * Copyright: 2017
 */


namespace LACC\Media;


trait VideoPaths
{
    use ThumbPaths;

    public function getThumbFolderStorageAttribute()
    {
        return "videos/{$this->id}";
    }

    public function getFileFolderStorageAttribute()
    {
        return "videos/{$this->id}";
    }

    public function getFileAssetAttribute()
    {
        return $this->isLocalDriver() ?
            route( 'admin.videos.file_asset', [ 'video' => $this->id ] ) :
            $this->thumb_path; //driver externo
    }

    public function getThumbSmallAssetAttribute()
    {
        return $this->isLocalDriver() ?
            route( 'admin.videos.thumb_small_asset', [ 'video' => $this->id ] ) :
            $this->thumb_path; //driver externo
    }

    public function getThumbDefaultAttribute()
    {
        return env( 'VIDEO_NO_THUMB' );
    }

    public function getFileRelativeAttribute()
    {
        return $this->file ? "{$this->file_folder_storage}/{$this->file}" : false;
    }

    public function getFilePathAttribute()
    {
        if( $this->file_relative ) {

            return $this->getAbsolutePath( $this->getStorage(), $this->file_relative );
        }

        return false;
    }
}