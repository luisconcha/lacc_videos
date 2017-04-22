<?php

use Illuminate\Database\Seeder;

use LACC\Models\Serie;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( Serie::class, 20 )->create();
    }
}
