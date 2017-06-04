<?php
/*i
 * File: VideoStorages.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 25/05/17
 * Time: 23:11
 * Project: lacc_videos
 * Copyright: 2017
 */


namespace LACC\Media;


use Illuminate\Filesystem\FilesystemAdapter;

trait VideoStorages
{
    /**
     * @return \Illuminate\Filesystem\FilesystemAdapter
     */
    public function getStorage()
    {
        return \Storage::disk( $this->getDiskDriver() );
    }

    protected function getDiskDriver()
    {
        return config( 'filesystems.default' );
    }

    protected function getAbsolutePath( FilesystemAdapter $storage, $fileRelativePath )
    {
        
        if( $this->isLocalDriver() ) {
            /** /var/www/html/lacc_videos/storage/app/series/1/thumb.jpg */
            return $storage->getDriver()->getAdapter()->applyPathPrefix( $fileRelativePath );
        } else {
            //Caso seja um Driver externo como S3, dropbox, etc
            return $storage->url( $fileRelativePath );
        }
    }

    public function isLocalDriver()
    {
        $driver = config( "filesystems.disks.{$this->getDiskDriver()}.driver" );
        
        return $driver == 'local';
    }

}