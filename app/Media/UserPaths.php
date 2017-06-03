<?php
/**
 * File: UserPaths.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 25/05/17
 * Time: 23:15
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\Media;

trait UserPaths
{
    use ThumbPaths;

    public function getThumbFolderStorageAttribute()
    {
        return "users/{$this->id}";
    }

    public function getThumbAssetAttribute()
    {
        return route( 'admin.users.thumb_asset', [ 'user' => $this->id ] );
    }

    public function getThumbSmallAssetAttribute()
    {
        return route( 'admin.users.thumb_small_asset', [ 'user' => $this->id ] );
    }

    public function getThumbDefaultAttribute()
    {
        return env( 'USER_NO_THUMB' );
    }
}