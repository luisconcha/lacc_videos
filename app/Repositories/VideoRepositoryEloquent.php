<?php

namespace LACC\Repositories;

use LACC\Media\ThumbUploads;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use LACC\Models\Video;

/**
 * Class VideoRepositoryEloquent
 * @package namespace LACC\Repositories;
 */
class VideoRepositoryEloquent extends BaseRepository implements VideoRepository
{
    use ThumbUploads;

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

    public function create( array $attributes )
    {
        $model =  parent::create( $attributes );

        if( isset( $attributes[ 'categories' ] ) ) {
            $model->categories()->sync( $attributes[ 'categories' ] );
        }

        return $model;
    }

    public function update( array $attributes, $id )
    {
        $model = parent::update( $attributes, $id );

        if( isset( $attributes[ 'categories' ] ) ) {
            $model->categories()->sync( $attributes[ 'categories' ] );
        }

        return $model;
    }
}
