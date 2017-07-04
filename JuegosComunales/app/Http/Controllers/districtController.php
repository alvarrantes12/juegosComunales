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
         
      $exist = $this-> exist($request->district);
      
      if(!$exist){
     $district = new district;
     $district->nameDistrict = $request->district;
     $district->active = 1;
     $district->save();
     $request->session()->flash('district', '¡ Distrito creado correctamente!');
     return $this->index();
      }else{
      $request->session()->flash('district', '¡Ya existe un distrito con este nombre!'); 
      return $this -> index ();  
     }
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

public function edit(Request $request, $IDDistrict){
         $district = district::where('district.IDDistrict', $IDDistrict)
                      ->first();
         $request->session()->flash('district', '¡ Distrito editado correctamente!');
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
    
     public function exist($nameDistrict){
    if (district::where('nameDistrict', '=', $nameDistrict)->exists()) {
       return true;
    }else{
       return false;
    }
  }
  
    public function deleteD($IDDistrict){
      if($this->active($IDDistrict)){
        district::where('IDDistrict', $IDDistrict)
          ->update(['active' => 0]);
          return $this->index();
    }else{
        district::where('IDDistrict', $IDDistrict)
          ->update(['active' => 1]);
          return $this->index();
    }} 
    
    private function active($IDDistrict){
       $cat = district::select('active')->where('IDDistrict', $IDDistrict)->get();
       $c = $cat[0]->active;
       if($c == 0){
           return false;
       }else{
           return true;
       }
        
    }
    
    
    
}
