<?php

namespace LACC\Repositories;

use Illuminate\Http\UploadedFile;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface VideoRepository
 * @package namespace LACC\Repositories;
 */
interface VideoRepository extends RepositoryInterface
{
    public function uploadThumb( $id, UploadedFile $file);
}
