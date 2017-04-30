<?php

namespace LACC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use LACC\Repositories\VideoRepository;
use LACC\Models\Video;

/**
 * Class VideoRepositoryEloquent
 * @package namespace LACC\Repositories;
 */
class VideoRepositoryEloquent extends BaseRepository implements VideoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Video::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app( RequestCriteria::class ) );
    }
}
