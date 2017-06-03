<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection as CollectionSupport;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;
use LACC\Models\User;
use LACC\Repositories\UserRepository;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $repository = app( UserRepository::class );
        $collectionThumbs = $this->getThumbs();

        
        $userTemp = factory( User::class )->create(
          [
            'name'           => 'Luis Alberto Concha Curay',
            'email'          => 'luvett11@gmail.com',
            'role'           => User::ROLE_ADMIN,
            'verified'       => true,
            'password'       => bcrypt( env( 'ADMIN_DEFAULT_PASSWORD', 'secret' ) ),
            'remember_token' => str_random( 100 ),
            'thumb'          => env( 'USER_NO_THUMB' )
          ]
        );
        $repository->uploadThumb( $userTemp->id, $collectionThumbs->random() );

        $userTemp = factory( User::class )->create(
          [
            'name'     => env( 'ADMIN_DEFAULT_NAME', 'Administrator' ),
            'email'    => env( 'ADMIN_DEFAULT_EMAIL', 'admin@user.com' ),
            'role'     => User::ROLE_ADMIN,
            'verified' => true,
            'password' => bcrypt( env( 'ADMIN_DEFAULT_PASSWORD', 'secret' ) ),
            'thumb'    => env( 'USER_NO_THUMB' )
          ]
        );
        $repository->uploadThumb( $userTemp->id, $collectionThumbs->random() );

        $userTemp = factory( User::class )->create(
          [
            'name'     => env( 'CLIENT_DEFAULT_NAME', 'Client' ),
            'email'    => env( 'CLIENT_DEFAULT_EMAIL', 'client@user.com' ),
            'role'     => User::ROLE_CLIENT,
            'verified' => false,
            'password' => bcrypt( env( 'CLIENT_DEFAULT_PASSWORD', 'secret' ) ),
            'thumb'    => env( 'USER_NO_THUMB' )
          ]
        );
        $repository->uploadThumb( $userTemp->id, $collectionThumbs->random() );
        
        $users      = factory( User::class, 20 )->create();

        $users->each( function ( $user ) use ( $repository, $collectionThumbs ) {
            
           $repository->uploadThumb($user->id, $collectionThumbs->random() );
        });
    }

    public function getThumbs()
    {
        return new CollectionSupport( [
            new \Illuminate\Http\UploadedFile(
                storage_path( 'app/files/faker/user/user1.png' ),
                'user1.png'
            ),
            new \Illuminate\Http\UploadedFile(
                storage_path( 'app/files/faker/user/user2.png' ),
                'user2.png'
            )
        ] );
    }
}
