<?php
/**
 * File: ThumbPaths.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 31/05/17
 * Time: 20:32
 * Project: lacc_videos
 * Copyright: 2017
 */


namespace LACC\Media;


trait ThumbPaths
{
    use VideoStorages;

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

}