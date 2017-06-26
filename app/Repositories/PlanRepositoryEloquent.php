<?php

namespace LACC\Repositories;

use LACC\Models\Plans;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace LACC\Repositories;
 */
class PlanRepositoryEloquent extends BaseRepository implements PlanRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Plans::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app( RequestCriteria::class ) );
    }

    public function getListDurationInSelect()
    {
        $duration = [ '' => '--select an duration--' ];
        $duration += [ Plans::DURATION_YEARLY => 'Yearly' ];
        $duration += [ Plans::DURATION_MONTHLY => 'Monthly' ];

        return $duration;
    }
}
