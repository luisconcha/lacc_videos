<?php

namespace LACC\Repositories;

use Illuminate\Http\UploadedFile;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SerieRepository
 * @package namespace LACC\Repositories;
 */
interface SerieRepository extends RepositoryInterface
{
    public function uploadThumb( $id, UploadedFile $file );
}
