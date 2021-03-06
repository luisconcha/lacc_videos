<?php

namespace LACC\Repositories;

use LACC\Media\ThumbUploads;
use LACC\Media\Uploads;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use LACC\Models\Serie;

/**
 * Class SerieRepositoryEloquent
 * @package namespace LACC\Repositories;
 */
class SerieRepositoryEloquent extends BaseRepository implements SerieRepository
{
    use ThumbUploads, Uploads;

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
        //Se por acaso der erro ao enviar o file, pega o valor default
        $attributes[ 'thumb' ] = env( 'SERIE_NO_THUMB' );
        $model = parent::create( array_except( $attributes, 'thumb_file' ) );
        $this->uploadThumb( $model->id, $attributes[ 'thumb_file' ] );

        return $model;
    }

    public function update( array $attributes, $id )
    {
        $model = parent::update( array_except( $attributes, 'thumb_file' ), $id );
        if( isset( $attributes[ 'thumb_file' ] ) ) {
            $this->uploadThumb( $model->id, $attributes[ 'thumb_file' ] );
        }

        return $model;
    }

    public function getListSeriesInSelect()
    {
        $series = [ '' => '--select a series--' ];
        $series += $this->model->pluck( 'title', 'id' )->all();

        return $series;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app( RequestCriteria::class ) );
    }
}
