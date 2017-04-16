<?php
use Illuminate\Database\Seeder;
use LACC\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( User::class )->create(
          [
            'name'           => 'Luis Alberto Concha Curay',
            'email'          => 'luvett11@gmail.com',
            'role'           => User::ROLE_ADMIN,
            'verified'       => true,
            'password'       => bcrypt( env( 'ADMIN_DEFAULT_PASSWORD', 'secret' ) ),
            'remember_token' => str_random( 100 ),
          ]
        );
        factory( User::class )->create(
          [
            'name'     => env( 'ADMIN_DEFAULT_NAME', 'Administrator' ),
            'email'    => env( 'ADMIN_DEFAULT_EMAIL', 'admin@user.com' ),
            'role'     => User::ROLE_ADMIN,
            'verified' => true,
            'password' => bcrypt( env( 'ADMIN_DEFAULT_PASSWORD', 'secret' ) ),
          ]
        );
        factory( User::class )->create(
          [
            'name'     => env( 'CLIENT_DEFAULT_NAME', 'Client' ),
            'email'    => env( 'CLIENT_DEFAULT_EMAIL', 'client@user.com' ),
            'role'     => User::ROLE_CLIENT,
            'verified' => false,
            'password' => bcrypt( env( 'CLIENT_DEFAULT_PASSWORD', 'secret' ) ),
          ]
        );
        factory( User::class, 20 )->create();
    }
}
