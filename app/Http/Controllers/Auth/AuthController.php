<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator; 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Role;

class AuthController extends Controller
{
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
    
    //protected $redirectTo = '/home';
    
    public function redirectPath()
    {
        // Logic that determines where to send the user
        foreach (\Auth::user()->roles()->get() as $role)
        {
            if ($role->name == 'Admin'){
                return '/admin';
            }elseif ($role->name == 'Inspector') {
                return '/inspections/';
            }elseif ($role->name == 'Rapporteur') {
                return '/reports/'; // yet to be done
            }elseif ($role->name == 'Applicant') {
                return '/applications/create';
            }
        }
    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $create = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);


        $user = User::find($create->id);

        $role = Role::where('name', '=', 'Applicant')->firstOrFail();

        $user->roles()->attach($role->id);

        return $create;
    }
}
