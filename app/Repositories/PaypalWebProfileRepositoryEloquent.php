<?php

namespace LACC\Repositories;

use LACC\Models\PaypalWebProfile;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use LACC\Models\Category;

/**
 * Class PaypalWebProfileRepositoryEloquent
 * @package LACC\Repositories
 */
class PaypalWebProfileRepositoryEloquent extends BaseRepository implements PaypalWebProfileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaypalWebProfile::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app( RequestCriteria::class ) );
    }
}
