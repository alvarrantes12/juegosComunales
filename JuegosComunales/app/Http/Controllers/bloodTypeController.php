<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\bloodType;

class bloodTypeController extends Controller
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

   public function insertBloodType(Request $request)
  {
      $bloodType = new bloodType;
      $bloodType->bloodType = 'AB+';
      $bloodType->save();
  }
  
  
}
