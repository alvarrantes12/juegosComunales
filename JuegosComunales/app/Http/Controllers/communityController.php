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
                     ->select('community.nameCommunity', 'district.nameDistrict', 'community.IDCommunity')
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
      if($this->communityExist($request-> community) == null){
        $community = new community;
        $community->nameCommunity = $request->community;
        $community->save();
        $this-> relateDistrict($request->community, $request->district);
        return $this->index();
      }else{
         return $this-> index();
          
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
  
  
  public function delete(Request $request, $IDCommunity){
     
      communityDistrict::where('IDCommunity' , $IDCommunity)->delete();
      community::where('IDCommunity', $IDCommunity)->delete();
      
    return $this->index();
}

 public function edit($IDCommunity){
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
         ->select('community.IDCommunity', 'community.nameCommunity')->where('district.IDDistrict', $district)->get();
         
         return  $community;
       
   } 
}
