<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\canton;

class cantonController extends Controller
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

  public function insertCanton(Request $request)
  {
      if($this->cantonExists($request-> nameCanton) == null){
        $canton = new canton;
        $canton->nameCanton = $request->nameCanton;
        $canton->save();
        $this-> relateProvice($request);
      }else{
          
      }
  }
  
  public function relateProvice(Request $request){
      $idCanton = DB::table('canton') ->select('IDCanton') -> where ('nameCanton', $request->nameCanton)->first();
      $idProvince  = DB::table('province') ->select('IDProvince') -> where ('nameProvince', $request->nameProvince)->first();
      $cantonProvince = new cantonProvince;
      $cantonProvince->IDCanton = $idCanton->IDCanton;
      $cantonProvince->IDProvince = $idProvince->IDProvince;
      $cantonProvince->save();
  }
  
  private function cantonExists($canton){
      $exist = DB::table('canton') ->select('IDCanton') -> where ('nameCanton', $canton )->first();
      return $exist;
  }
  
  
}
