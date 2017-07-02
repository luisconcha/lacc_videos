<?php

namespace LACC\Listeners;

use LACC\Events\PaypalPaymentApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use LACC\Repositories\OrderRepository;

class CreatedOrderListener
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct( OrderRepository $orderRepository )
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Handle the event.
     *
     * @param  PaypalPaymentApproved $event
     * @return void
     */
    public function handle( PaypalPaymentApproved $event )
    {
        $plan = $event->getPlan();
        
        $order = $this->orderRepository->create( [
            'user_id' => \Auth::guard( 'api' )->user()->id,
            'value'   => $plan->value
        ] );

        $event->setOrder( $order );
    }
}
