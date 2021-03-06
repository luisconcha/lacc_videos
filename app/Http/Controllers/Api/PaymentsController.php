<?php

namespace LACC\Http\Controllers\Api;

use Illuminate\Http\Request;
use LACC\Http\Controllers\Controller;
use LACC\Http\Request\OrderRequest;
use LACC\Models\Plans;
use LACC\PayPal\PaymentClient;

class PaymentsController extends Controller
{
    /** @var  PaymentClient */
    private $paymentClient;

    function __construct( PaymentClient $paymentClient )
    {
        $this->paymentClient = $paymentClient;
    }

    public function makePayment( Plans $plan )
    {
        $payment = $this->paymentClient->makePayment( $plan );

        return [
            'approval_url' => $payment->getApprovalLink(),
            'payment_id'   => $payment->getId()
        ];
    }

    public function store( OrderRequest $request, Plans $plan )
    {
        $order = $this->paymentClient->doPayment( $plan );

        return $order;
    }
}
