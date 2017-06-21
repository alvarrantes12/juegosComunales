<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\person;
use App\User;

class loginFController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | insertNew Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registerFirstTime (Request $request) {
        Person::where('IDPerson', $request->IDPerson)->update(['telephone' => $request->telephone, 'email' => $request->email]);
        User::where('IDPerson', $request->IDPerson)->update(['password' => bcrypt($request-> password)]);
        $person = Person::join ('role', 'person.IDRole', '=', 'role.IDRole')
            -> join ('community', 'person.IDCommunity', '=', 'community.IDCommunity')
            -> select('person.name','person.lastname1', 'person.lastname2', 'person.telephone', 'person.email', 'person.IDCommunity', 'person.IDRole', 'role.role', 'community.nameCommunity') -> where ('IDPerson', $request -> IDPerson)->first();
        session(['key' =>  $request -> IDPerson]);
                        session(['role' =>  $person -> role]);
                        session(['email' =>  $person -> email]);
                        session(['telephone' =>  $person -> telephone]);
                        $user = $person -> name ." " . $person -> lastname1 . " " . $person -> lastname2;
                        session(['userP' => $user ]);
        if($person -> IDRole == '1') {
            return view('/adminMasterPageSlider')
                ->with ('userP', $person);
         } else  if($person -> IDRole == '2'){
            return view('/masterPageSlider')
                ->with ('userP', $person);
        }
    }
    
    
  
}
