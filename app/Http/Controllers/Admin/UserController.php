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
        $request[ 'role' ]     = User::ROLE_ADMIN;

        return parent::store( $request );
    }

    public function passwordForm( $id )
    {
        $user = $this->repository->find( $id );

        return view( "{$this->view}.password", compact( 'user' ) );
    }

    public function passwordStore( Request $request )
    {
        $this->validate( $request, $this->model->rulesPassword() );
        $data[ 'password' ] = bcrypt( $request->input( 'password' ) );
        $userId             = auth()->user()->id;
        if ( $this->repository->update( $data, $userId ) ) {
            $message = "Congratulations, record was changed successfully!";
            createMessage( $request, 'message', 'success', $message );

            return redirect()->route( 'admin.users.show', $userId );
        }
        createMessage( $this->request, 'error', 'danger', 'There was an error trying to save the record.' );

        return redirect()->route( "{$this->route}.create" )->withInput();
    }
}
