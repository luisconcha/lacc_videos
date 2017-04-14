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

        $data['message'] = "O registro {$user->name} foi inserido na base de dados com sucesso";
        getObjectPusher('module_user','save_user', $data);


        return redirect()->route('admin.users.lists');
    }
}
