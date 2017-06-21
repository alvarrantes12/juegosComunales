<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\edition;

class editionController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/Edition/show')
            ->with ('edition', Edition::all());
    }
    
     public function insertEdition(){
        return view('/Edition/new');
    }
    
    
     public function insertNewEdition(Request $request)
  {
      $edition = new edition;
      $edition->nameEdition = $request-> nameEdition;
      $edition->year = $request-> year;
      $edition->startDate = $request-> startDate;
      $edition->endDate = $request-> endDate;
      $edition->save();
      return $this -> index ();
  }
  
   public function deleteEdition($IDEdition){
       $edition = Edition::where('IDEdition', $IDEdition)->delete();
       return $this -> index ();
    }
  
    public function editEdition($IDEdition){
         $edition = Edition::select('IDEdition','nameEdition', 'year', 'startDate', 'endDate')->where('IDEdition', $IDEdition)
                      ->first();
        return view('/Edition/edit')
            ->with ('eEdition', $edition);
    }
    
    public function eEdition (Request $request){
        Edition::where('IDEdition', $request->IDEdition)->update(['nameEdition' => $request->nameEdition,'year' => $request->year,
        'startDate' => $request->startDate, 'endDate' => $request->endDate]); 
        return $this->index();
    }
    
    public function search (Request $request){
         $all = edition::where('nameEdition', $request->filter)->orWhere('year',$request->filter)
        ->get();
            return view('/Edition/show')
            ->with('edition', $all);
       
    }
}
