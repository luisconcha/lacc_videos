<?php

namespace LACC\Listeners;

use LACC\Models\Order;
use LACC\Repositories\SubscriptionRepository;
use Prettus\Repository\Events\RepositoryEntityCreated;

class CreatedSubscriptionListener
{
    /** @var  SubscriptionRepository */
    private $subscriptionRepository;

    /**
     * CreatedSubscriptionListener constructor.
     * @param SubscriptionRepository $subscriptionRepository
     */
    public function __construct( SubscriptionRepository $subscriptionRepository )
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    /**
     * Handle the event.
     *
     * @param  RepositoryEntityCreated $event
     * @return void
     */
    public function handle( RepositoryEntityCreated $event )
    {
        $model = $event->getModel();
        if( !( $model instanceof Order ) ) {
            return;
        }

        $this->subscriptionRepository->create( [
            'order_id' => $model->id,
            'plan_id'  => 1
        ] );
    }
}
