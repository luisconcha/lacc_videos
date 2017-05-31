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
    use VideoStorages;

    public function getThumbFolderStorageAttribute()
    {
        return "series/{$this->id}";
    }

    public function getThumbRelativeAttribute()
    {
        return "{$this->thumb_folder_storage}/{$this->thumb}";
    }

    public function getThumbPathAttribute()
    {
        return $this->getAbsolutePath( $this->getStorage(), $this->thumb_relative );
    }

    public function getThumbSmallRelativeAttribute()
    {
        list( $name, $extension ) = explode( '.', $this->thumb );

        return "{$this->thumb_folder_storage}/{$name}_small.{$this->thumb}";
    }

    public function getThumbSmallPathAttribute()
    {
        return $this->getAbsolutePath( $this->getStorage(), $this->thumb_small_relative );
    }

    public function getThumbAssetAttribute()
    {
        return route( 'admin.series.thumb_asset', [ 'serie' => $this->id ] );
    }

    public function getThumbSmallAssetAttribute()
    {
        return route( 'admin.series.thumb_small_asset', [ 'serie' => $this->id ] );
    }
}