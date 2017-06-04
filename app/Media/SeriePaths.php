<?php
/**
 * File: SeriePaths.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 25/05/17
 * Time: 23:15
 * Project: lacc_videos
 * Copyright: 2017
 */


namespace LACC\Media;


trait SeriePaths
{
    use ThumbPaths;

    public function getThumbFolderStorageAttribute()
    {
        return "series/{$this->id}";
    }

    public function getThumbAssetAttribute()
    {
        return $this->isLocalDriver() ?
            route( 'admin.series.thumb_asset', [ 'serie' => $this->id ] ) :
            $this->thumb_path;
    }

    public function getThumbSmallAssetAttribute()
    {
        return $this->isLocalDriver() ?
            route( 'admin.series.thumb_small_asset', [ 'serie' => $this->id ] ) :
            $this->thumb_path;
    }

    public function getThumbDefaultAttribute()
    {
        return env( 'SERIE_NO_THUMB' );
    }
}