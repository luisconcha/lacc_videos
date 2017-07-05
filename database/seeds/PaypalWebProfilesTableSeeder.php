<?php
use Illuminate\Database\Seeder;
use LACC\Models\PaypalWebProfile;

class PaypalWebProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( PaypalWebProfile::class, 20 )->create();
    }
}
