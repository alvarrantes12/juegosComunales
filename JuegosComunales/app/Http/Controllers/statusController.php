<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\status;

class statusController extends Controller
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

   public function insertStatus (Request $request)
  {
      $status = new status;
      $status->status = 'Inscrito';
      $status->save();
  }
  
  
}
