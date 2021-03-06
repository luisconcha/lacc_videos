<?php
use Illuminate\Database\Seeder;
use LACC\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( Category::class, 10 )->create();
    }
}
