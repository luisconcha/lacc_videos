<?php
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( \LACC\Models\User::class )->create(
          [
            'name'           => 'Luis Alberto Concha Curay',
            'email'          => 'luvett11@gmail.com',
            'password'       => bcrypt( '123456' ),
            'remember_token' => str_random( 100 ),
          ]
        );
        factory( \LACC\Models\User::class, 20 )->create();
    }
}
