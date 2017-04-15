<?php
namespace LACC\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LACC\Http\Controllers\Controller;
use LACC\Models\User;

class UserController extends Controller
{
    /** @var  Request */
    protected $request;

    public function __construct( Request $request )
    {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view( 'admin.user.index', compact( 'users' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.user.add' );
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $data               = $this->request->all();
        $data[ 'password' ] = User::generatePassword();
        $data[ 'role' ]     = User::ROLE_CLIENT;
        $user               = new User();
        $user->fill( $data );
        $user->save();
        //Envia mensagem para usuários ADMIN com Pusher
        $data[ 'message' ] = "O registro {$user->name} foi inserido na base de dados com sucesso";
        getObjectPusher( 'module_user', 'save_user', $data );
        //
        $message = "Congratulations, the user have been successfully registered!";
        createMessage( $this->request, 'message', 'success', $message );

        return redirect()->route( 'admin.users.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \LACC\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show( User $user )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \LACC\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( User $user )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \LACC\Models\User        $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, User $user )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \LACC\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( User $user )
    {
        //
    }
}
