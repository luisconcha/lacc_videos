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
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payee;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class PaymentClient
{
    /**
     * @var ApiContext
     */
    private $apiContext;


    public function __construct( ApiContext $apiContext )
    {
        $this->apiContext = $apiContext;
    }


    /**
     * Finish payment
     * @param Plans $plan
     * @return mixed
     */
    public function doPayment( Plans $plan )
    {
        $event = new PaypalPaymentApproved( $plan );
        event( $event );

        return $event->getOrder();
    }

    public function makePayment( Plans $plan )
    {
        $payer = new Payer();
        $payer->setPaymentMethod( 'paypal' );

        $duration = $plan->duration == Plans::DURATION_MONTHLY ? 'Mensal' : 'Anual';
        $item = new Item();
        $item->setName( "Plan $duration" )
             ->setSku( $plan->sku )//mutator
             ->setCurrency( 'BRL' )
             ->setQuantity( 1 )
             ->setPrice( $plan->value );

        $itemList = new ItemList();
        $itemList->setItems( [ $item ] );

        $details = new Details();
        $details->setShipping( 0 )
                ->setTax( 0 )
                ->setSubtotal( $plan->value );

        $amount = new Amount();
        $amount->setCurrency( 'BRL' )
               ->setTotal( $plan->value )
               ->setDetails( $details );

        $payee = new Payee();
        $payee->setEmail( env( 'PAYPAL_PAYEE_EMAIL' ) );

        $transaction = new Transaction();
        $transaction->setAmount( $amount )
                    ->setDescription( "Payment of the subscription plan" )
                    ->setPayee( $payee )
                    ->setInvoiceNumber( uniqid() );

        $baseUrl = url( '/' );

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl( "$baseUrl/payment/success" )
                     ->setCancelUrl( "$baseUrl/payment/cancel" );

        $payment = new Payment();

        $payment->setExperienceProfileId( $plan->webProfile->code )
                ->setIntent( 'sale' )
                ->setPayer( $payer )
                ->setRedirectUrls( $redirectUrls )
                ->setTransactions( [ $transaction ] );

//        $payment->create( $this->apiContext );
        try {
            $payment->create($this->apiContext);
        }catch (PayPalConnectionException $exception){
            //return response()->json($exception->getMessage());
            \Log::error($exception->getMessage(),['data' => $exception->getData()]);
            throw $exception;
        }

        return $payment;
    }
}