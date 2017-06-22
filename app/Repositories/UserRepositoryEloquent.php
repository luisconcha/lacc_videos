<?php

namespace LACC\Repositories;

use Illuminate\Http\UploadedFile;
use LACC\Media\ThumbUploads;
use LACC\Media\Uploads;
use LACC\Models\User;
use LACC\Notifications\UserRegistration;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent
 * @package LACC\Repositories
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    use ThumbUploads, Uploads;

    //@seed: https://github.com/andersao/l5-repository#create-a-criteria
    protected $fieldSearchable = [
        'name',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app( RequestCriteria::class ) );
    }

    public function create( array $attributes )
    {
        $attributes[ 'password' ] = User::generatePassword();
//        $attributes[ 'role' ] = User::ROLE_ADMIN;
        $attributes[ 'thumb' ]    = env( 'USER_NO_THUMB' );

        $model = parent::create( array_except( $attributes, 'thumb_file' ) );

        $this->uploadThumb( $model->id, $attributes[ 'thumb_file' ] );

        if( $model ) {

            \UserVerification::generate( $model );
            \UserVerification::send( $model, 'The user account was created successfully' );

            \Auth::user()->notify( new UserRegistration( $model ) );

            return $model;
        }

    }
}
