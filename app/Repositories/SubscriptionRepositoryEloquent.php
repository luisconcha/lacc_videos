<?php

namespace LACC\Repositories;

use Carbon\Carbon;
use LACC\Models\Plans;
use LACC\Models\Subscription;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace LACC\Repositories;
 */
class SubscriptionRepositoryEloquent extends BaseRepository implements SubscriptionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Subscription::class;
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
        $planRepository = app( PlanRepository::class );
        $plan = $planRepository->find( $attributes[ 'plan_id' ] );

        $attributes[ 'expires_at' ] = $this->calculateExpiresAt( $plan );

        return parent::create( $attributes );
    }

    public function calculateExpiresAt( Plans $plan )
    {
        if( $plan->duration == Plans::DURATION_MONTHLY ) {
            return ( new Carbon() )->addMonth( 1 )->format( 'Y-m-d' );
        } else {
            return ( new Carbon() )->addYear( 1 )->format( 'Y-m-d' );
        }
    }
}
