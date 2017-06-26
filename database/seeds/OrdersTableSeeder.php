<?php
use Illuminate\Database\Seeder;
use LACC\Repositories\UserRepository;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = app( UserRepository::class )->all();
        $orders = factory( \LACC\Models\Order::class, 30 )->make();
        $orders->each( function( $order ) use ( $users ) {
            $order->user_id = $users->random()->id;
            $order->save();
        } );
    }
}
