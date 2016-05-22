<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Set custom login path
     */
    protected $loginPath = '/login';

    /**
     * Set custom view login
     */
    protected $loginView = 'pages.auth.login';

    /**
     * Set custom username field
     */
    protected $username = 'username';

    /**
     * Set custom redirection after login success
     */
    protected $redirectTo = 'class';

    /**
     * Set custom redirection after logout
     */
    protected $redirectAfterLogout = '/login';


    protected $userRepository;

    /**
     * Create a new authentication controller instance.
     *
     * @param   UserRepository Repository to access App\Models\User
     * @return  void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

        $this->middleware('guest', ['except' => ['getLogout','change']]);
    }


    public function change($role){
        $arrayOfRole = session('arrayOfRole');
        if( in_array($role, $arrayOfRole) ){
            session()->forget('role');
//            session()->set('role', $role);
            return redirect()->back();
        }
        else abort(403);
    }
}
