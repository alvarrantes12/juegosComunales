<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\district;
use App\community;
use App\communityDistrict;

class districtController extends Controller
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

 public function index()
    {
        return view('/District/show')
        ->with('district', District::all());
    }
     public function add(){
        return view('/District/new');
    }
    
  
  public function newDistrict(Request $request){
         
    if($this->districtExist($request-> district) == null){
     $district = new district;
     $district->nameDistrict = $request->district;
     $district->save();
     return $this->index();
    }else{}
    }
    
     private function districtExist($district){
      $exist = district::select('IDDistrict') -> where ('nameDistrict', $district )->first();
      return $exist;
  }
  
  public function delete(Request $request, $IDDistrict){
     
      communityDistrict::where('IDDistrict' , $IDDistrict)->delete();
      district::where('IDDistrict', $IDDistrict)->delete();
     return $this->index();
    
}

public function edit($IDDistrict){
         $district = district::where('district.IDDistrict', $IDDistrict)
                      ->first();
        return view('/District/edit')
            ->with ('district', $district);
            
    }
    
    public function editDistrict(Request $request){
     district::where('IDDistrict', $request->idDistrict)->update(['nameDistrict' => $request->district]); 
     
   
        return $this->index();
            
    }

public function search (Request $request){
         $all = district::where('nameDistrict', $request->filter)
        ->get();
            return view('/District/show')
            ->with('district', $all);
       
    }
}
