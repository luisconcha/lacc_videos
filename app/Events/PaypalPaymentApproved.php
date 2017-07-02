<?php

namespace LACC\Events;

use LACC\Models\Plans;

class PaypalPaymentApproved
{

    /** @var  Plans */
    private $plan;

    private $order;

    /**
     * PaypalPaymentApproved constructor.
     * @param Plans $plan
     */
    public function __construct( Plans $plan )
    {
        $this->plan = $plan;
    }

    /**
     * @return Plans
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     * @return PaypalPaymentApproved
     */
    public function setOrder( $order )
    {
        $this->order = $order;

        return $this;
    }


}
