<?php

namespace LACC\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use LACC\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use LACC\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Adds the role of ADMIN to allow access only users with this user role
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');
        //$data['role'] = User::ROLE_ADMIN;
        return $data;
    }
}
