<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    protected $redirectPath = '/home';
    protected $loginPath = '/auth/login';
    protected $username = 'login';
    protected $redirectTo = '/';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validato
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => 'required|max:255',
            'password' => 'required'
        ]);
    }

    protected function postLogin(Request $request)
    {
        $user = User::where('login',$request->login)->where('password',$request->password)->get();
        if(count($user) > 0)
        {
            // Authentication passed...
            return redirect('/home');
        }
        else
        {
            return redirect('/');
        }
    }
    /**
    * metodo que permite la autenticacion de un usuario
    */
    protected function authenticate()
    {
        if (Auth::attempt(['login' => $login, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('welcome');
        }
    }

    protected function Login()
    {
        $user = Auth::user();
    }
    
    protected function getLogin()
    {
        return view('welcome');
    }
}