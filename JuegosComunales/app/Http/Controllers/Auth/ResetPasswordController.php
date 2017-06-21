<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use App\person;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
   // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function updatePassword (Request $request){
        if (Person::where ('IDPerson', $request->IDPerson)){
            User::where ('IDPerson', $request->IDPerson)->update(['password' => bcrypt( $request->password), 
            'remember_token' => Str::random(60)]);
            return view ('/auth/login');
        }else{
            return view ('/auth/login');
        }
    }
}
