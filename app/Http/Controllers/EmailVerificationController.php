<?php
namespace LACC\Http\Controllers;

use Illuminate\Http\Request;
use Jrean\UserVerification\Traits\VerifiesUsers;
use LACC\Repositories\UserRepository;

class EmailVerificationController extends Controller
{
    use VerifiesUsers;

    /** @var  UserRepository */
    protected $userRepository;

    public function __construct( UserRepository $userRepository )
    {
        $this->userRepository = $userRepository;
    }

    public function redirectAfterVerification()
    {
        $this->loginUser();

        return url( 'admin/password-change/' . auth()->user()->id );
    }

    protected function loginUser()
    {
        $email = \Request::get( 'email' );
        $user  = $this->userRepository->findByField( 'email', $email )->first();
        \Auth::login( $user );
    }
}
