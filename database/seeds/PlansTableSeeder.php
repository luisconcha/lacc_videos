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
        factory( Plans::class, 15 )->create();
    }
}
