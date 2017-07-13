<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\community;
use App\district;
use App\communityDistrict;

class communityController extends Controller
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
        $all = community::join('communityDistrict', 'community.IDCommunity', '=' , 'communityDistrict.IDCommunity')
                    -> join('district', 'communityDistrict.IDDistrict', '=', 'district.IDDistrict')
                     ->select('community.nameCommunity', 'district.nameDistrict', 'community.IDCommunity', 'community.active')
                      ->get();
        return view('/Community/show')
        ->with('community', $all);
    }
    public function add(){
        return view('/Community/new')
        ->with('district', District::all());
    }
    
    public function newCommunity(Request $request)
  {
     $exist = $this-> exist($request->community);
      
      if(!$exist){
        $community = new community;
        $community->nameCommunity = $request->community;
        $community->active = 1;
        $community->save();
        $this-> relateDistrict($request->community, $request->district);
        $request->session()->flash('comm', '¡ Comunidad creada correctamente!');
        return $this->index();
      }else{
      $request->session()->flash('comm', '¡Ya existe una comunidad con este nombre!'); 
      return $this -> add ();  
  }
     
     
  }
  
  public function relateDistrict($community , $district ){
      $idCommunity = community::select('IDCommunity') -> where ('nameCommunity', $community)->first();
      $communityDistrict = new communityDistrict;
      $communityDistrict->IDCommunity = $idCommunity -> IDCommunity;
      $communityDistrict->IDDistrict = $district;
      $communityDistrict->save();
      
      
  }
  
  private function communityExist($community){
      $exist = community:: select('IDCommunity') -> where ('nameCommunity', $community )->first();
      return $exist;
  }
  

 public function edit( $IDCommunity){
         $community = community::join('communityDistrict', 'community.IDCommunity', '=' , 'communityDistrict.IDCommunity')
                    -> join('district', 'communityDistrict.IDDistrict', '=', 'district.IDDistrict')
                     ->select('community.nameCommunity', 'district.nameDistrict', 'communityDistrict.IDDistrict', 'community.IDCommunity')->where('community.IDCommunity', $IDCommunity)
                      ->first();
            $district = District::all();
            
            return view('/Community/edit')
            ->with ('Community', $community)->with ('district', $district);
            
    }
    
    public function editCommunity(Request $request){
     community::where('IDCommunity', $request->idCommunity)->update(['nameCommunity' => $request->community]); 
      communityDistrict::where('IDCommunity', $request->idCommunity)->update(['IDDistrict' => $request->district]); 
    $request->session()->flash('comm', '¡ Comunidad editada correctamente!');
        return $this->index();
            
    }
    
    public function search (Request $request){
         $all = community::join('communityDistrict', 'community.IDCommunity', '=' , 'communityDistrict.IDCommunity')
        -> join('district', 'communityDistrict.IDDistrict', '=', 'district.IDDistrict')
        ->select('community.nameCommunity', 'district.nameDistrict', 'community.IDCommunity')
        ->where('nameCommunity', $request->filter)
        ->orWhere('nameDistrict', $request->filter)
        ->get();
            return view('/Community/show')
            ->with('community', $all);
       
    }
   
   public function getCommunity ($district){
       $community = community::join('communityDistrict', 'community.IDCommunity', '=', 'communityDistrict.IDCommunity')
       ->join ('district','communityDistrict.IDDistrict','=','district.IDDistrict')
         ->select('community.IDCommunity', 'community.nameCommunity', 'community.active')->where('district.IDDistrict', $district)->get();
         
         return  $community;
       
   } 
   
    public function exist($nameCommunity){
    if (community::where('nameCommunity', '=', $nameCommunity)->exists()) {
       return true;
    }else{
       return false;
    }
  }
   
  public function delete($IDCommunity){
      if($this->active($IDCommunity)){
        community::where('IDCommunity', $IDCommunity)
          ->update(['active' => 0]);
          return $this->index();
    }else{
        community::where('IDCommunity', $IDCommunity)
          ->update(['active' => 1]);
          return $this->index();
    }} 
    
    private function active($IDCommunity){
       $com = community::select('active')->where('IDCommunity', $IDCommunity)->get();
       $c = $com[0]->active;
       if($c == 0){
           return false;
       }else{
           return true;
       }
        
    }  
   
   
   
   
}
