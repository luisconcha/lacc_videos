<?php
namespace LACC\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LACC\Http\Controllers\Controller;
use LACC\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $data = $request->all();
        $data['password'] = bcrypt('123456');
        $data['role'] = User::ROLE_CLIENT;

        $user = new User();

        $user->fill($data);
        $user->save();

        $data['message'] = "O registro {$user->name} foi inserido na base de dados com sucesso";
        getObjectPusher('module_user','save_user', $data);


        return redirect()->route('admin.users.index');
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
