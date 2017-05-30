<?php

namespace LACC\Repositories;

use LACC\Media\ThumbUploads;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use LACC\Models\Serie;

/**
 * Class SerieRepositoryEloquent
 * @package namespace LACC\Repositories;
 */
class SerieRepositoryEloquent extends BaseRepository implements SerieRepository
{
    use ThumbUploads;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Serie::class;
    }

    public function create( array $attributes )
    {
        $model = parent::create( array_except($attributes,'thumb_file') );
        $this->uploadThumb( $model->id, $attributes[ 'thumb_file' ] );

        return $model;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app( RequestCriteria::class ) );
    }
}
