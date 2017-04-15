<?php
namespace LACC\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LACC\Http\Controllers\StandarController;
use LACC\Models\User;
use LACC\Repositories\UserRepository;

class UserController extends StandarController
{
    /** @var User */
    protected $model = 'user';

    /** @var  UserRepository */
    protected $repository;

    /** @var  UserValidator */
    protected $validator;

    protected $route = 'admin.users';

    protected $view = 'admin.user';

    protected $totalPage = 15;

    public function __construct( UserRepository $repository, User $modelUser )
    {
        $this->model      = $modelUser;
        $this->repository = $repository;
    }

    public function store( Request $request )
    {
        $request[ 'password' ] = User::generatePassword();
        $request[ 'role' ]     = User::ROLE_CLIENT;

        return parent::store( $request );

    }
}
