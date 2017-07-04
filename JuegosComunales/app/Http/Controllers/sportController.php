<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\sport;
use App\sportType;

class sportController extends Controller
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
        return view('/Sport/show')
         ->with ('sport', Sport::all());
    }
    
     public function insertSport(){
        return view('/Sport/new')
            ->with ('sportType', SportType::all());
    }
     public function insertNewSport(Request $request)
  {
      
      $exist = $this-> exist($request->sportName);
      
      if(!$exist){
      $sport = new sport;
      $sport->nameSport = $request-> sportName;
      $sport->active = 1;
      $sport->IDSportType = $request-> sportT;
      $sport->athletesAmount = $request-> athleteAmount;
      $sport->save();
       $request->session()->flash('sport', '¡ Deporte creado correctamente!');
      return $this -> index();
  }else{
      $request->session()->flash('sport', '¡Ya existe un deporte con este nombre!'); 
      return $this -> index ();  
  }
  }
 
     public function exist($sportName){
    if (Sport::where('nameSport', '=', $sportName)->exists()) {
       return true;
    }else{
       return false;
    }
  }
    
    
    
    
    
    public function editSport($IDSport){
         $sport = Sport::join('sportType', 'sport.IDSportType', '=' , 'sportType.IDSportType')
                     ->select('sport.IDSport', 'sport.nameSport', 'sport.active', 'sport.athletesAmount', 'sportType.IDSportType',
                     'sportType.sportType')->where('sport.IDSport', $IDSport)
                      ->first();
        return view('/Sport/edit')
            ->with ('eSport', $sport)
              ->with ('sportType', SportType::all());
            return $this->index();
    }
    
   public function eSport (Request $request){
        Sport::where('IDSport', $request->IDSport)->update(['nameSport' => $request->nameSport,
        'active' => $request->active, 
        'athletesAmount' => $request->athleteAmount,
        'IDSportType' => $request->sportT]
        ); 
         $request->session()->flash('sport', '¡ Deporte editado correctamente!');
        return $this->index();
    }
    
     public function deleteSport($IDSport){
      if($this->active($IDSport)){
        Sport::where('IDSport', $IDSport)
          ->update(['active' => 0]);
          return $this->index();
    }else{
        Sport::where('IDSport', $IDSport)
          ->update(['active' => 1]);
          return $this->index();
    }}
    
     private function active($IDSport){
       $cat = sport::select('active')->where('IDSport', $IDSport)->get();
       $c = $cat[0]->active;
       if($c == 0){
           return false;
       }else{
           return true;
       }
        
    }
    public function search (Request $request){
         $all = sport::join ('sportType','sport.IDSportType','=','sportType.IDSportType')->where('nameSport', $request->filter)->orWhere('sportType.sportType',$request->filter)
        ->get();
            return view('/Sport/show')
            ->with('sport', $all);
       
    }
    
    
  
}

