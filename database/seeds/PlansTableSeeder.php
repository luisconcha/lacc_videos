<?php
use Illuminate\Database\Seeder;
use LACC\Models\Plans;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $webProfile = app(\LACC\Repositories\PaypalWebProfileRepository::class)->all();
        $plans      = factory( Plans::class, 15 )->make();
        $plans->each( function ( $plan ) use ( $webProfile ){
            $plan->paypal_web_profile_id  = $webProfile->random()->id;
            $plan->save();
        });
    }
}
