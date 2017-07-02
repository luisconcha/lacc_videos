<?php
/**
 * File: PaymentClient.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 30/06/17
 * Time: 22:00
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\PayPal;


use LACC\Events\PaypalPaymentApproved;
use LACC\Models\Plans;

class PaymentClient
{
    public function doPayment( Plans $plan )
    {
        $event = new PaypalPaymentApproved( $plan );
        event( $event );

        return $event->getOrder();
    }
}