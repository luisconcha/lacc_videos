<?php

use Illuminate\Database\Seeder;
use LACC\Models\Subscription;
use LACC\Repositories\PlanRepository;
use LACC\Repositories\OrderRepository;
use LACC\Repositories\SubscriptionRepository;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptionRepository = app( SubscriptionRepository::class );
        $plans = app( PlanRepository::class )->all();
        $orders = app( OrderRepository::class )->all();

        foreach( range( 1, 20 ) as $element ):
            $subscriptionRepository->create( [
                'plan_id'  => $plans->random()->id,
                'order_id' => $orders->random()->id
            ] );
        endforeach;

        /**
         * //Criamos uma coleção vazia do modelo
         * $subscriptions = factory( Subscription::class, 20 )->make();
         *
         * $subscriptions->each( function( $subscription ) use ( $plans, $orders ) {
         * $subscription->plan_id = $plans->random()->id;
         * $subscription->order_id = $orders->random()->id;
         * $subscription->expires_at = '2017-08-17';
         * $subscription->save();
         * } );
         */
    }
}
