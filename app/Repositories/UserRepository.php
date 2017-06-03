<?php
namespace LACC\Repositories;

use Illuminate\Http\UploadedFile;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository
 * @package LACC\Repositories
 */
interface UserRepository extends RepositoryInterface
{
    public function uploadThumb( $id, UploadedFile $file);
}
