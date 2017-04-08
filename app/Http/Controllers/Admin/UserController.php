<?php

namespace LACC\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LACC\Http\Controllers\Controller;
use LACC\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function add()
    {
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt('123456');
        $data['role'] = '2';

        $user = new User();

        $user->fill($data);
        $user->save();

        //event(new UserHasBeenRegistered($user));

        $options = array(
            'encrypted' => true
        );
        $pusher = new \Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data['message'] = "O registro {$user->name} foi inserido na base de dados com sucesso";
        $pusher->trigger('module_user', 'save_user', $data);


        return redirect()->route('admin.users.lists');
    }
}
