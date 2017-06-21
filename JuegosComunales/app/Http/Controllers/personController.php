<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\person;

use App\community;
use App\athleteCategory;
use App\category;
use App\categorySport;
use App\district;
use App\sport;
use App\athlete;
use App\role;
use App\sportType;
use App\bloodType;
session_start();

class personController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | person Controller
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

  public function query()
  {
      $person = person::all();
      
      dd($person);
  }
  
   public function insertPerson(Request $request)
  {
   $exist = $this-> exist($request->IDPerson);
   
   if($exist = 0){
      $person = new person;
       $person->IDPerson = $request->IDPerson;
        $person->name = $request->name;
         $person->lastName1 = $request->lastName1;
          $person->lastName2 = $request->lastName2;
           $person->telephone = $request->telephone;
            $person->email = $request->email;
             $person->birthDate = $request->birthDate;
             $person->telephone = $request->telephone;
             $person->IDRole =  $request->role;
             $person->IDCommunity =  $request->community;
             $person->active = 1;
      
   if($request->role == 3){
    $_SESSION['person'] = $person;
       $_SESSION['IDRole'] =$request->role;
          $_SESSION['IDCommunity'] = $request->community;
          
     return $this-> documents();
   }else{
     $person->save();
     return $this-> index();
   }
   }else{
 return $this-> index();
}
}
  
  //Metodos athletas//
   public function insertDoc(Request $request)
    {
     
     $personS = $_SESSION['person'];
       $athlete = new athlete;
       $athlete->IDBloodType = $request->bloodType;
       $athlete->height = $request->height;
       $athlete->weight = $request->weight; 
       $athlete->IDPerson = $personS->IDPerson;
       $athlete->IDStatus = 1;
       
       $athleteCategory = new athleteCategory;
       $athleteCategory->IDCategory = $request->category;
       $athleteCategory->IDPerson = $personS->IDPerson;
       
       
       $person = new person;
       $person->IDPerson = $personS->IDPerson;
        $person->name = $personS->name;
         $person->lastName1 = $personS->lastName1;
          $person->lastName2 = $personS->lastName2;
           $person->telephone = $personS->telephone;
            $person->email = $personS->email;
             $person->birthDate = $personS->birthDate;
             $person->telephone = $personS->telephone;
            
               $IDRol = $_SESSION['IDRole'];
               $IDCommunity = $_SESSION['IDCommunity'];
               
             $person->IDRole =  $IDRol;
             $person->IDCommunity = $IDCommunity;
             $person->active = 1;
       
       
        $person->save();
        $athlete->save();
        $athleteCategory->save();
        return $this-> index();
    }
   
   
   public function insertNew()
    {
        return view('/Inscription/insertNew');
    }
    
   public function insertNewA()
    {
        return view('/Admin/insertNew')
        ->with('district', District::all())
        ->with('role', Role::all())
        ->with('community', Community::all()); 
    }
    
    public function insertF()
    {
        return view('/Admin/index');
    }
    
    public function index()
    {
     $person =  sport::join ('categorySport','sport.IDSport','=','categorySport.IDSport')
           -> join('category','categorySport.IDCategory','=','category.IDCategory')
           -> join('athleteCategory','category.IDCategory','=','athleteCategory.IDCategory')
           -> join('person','athleteCategory.IDPerson','=','person.IDPerson')
           ->join('community','person.IDCommunity','=','community.IDCommunity')
        
         ->select('person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','category.nameCategory','sport.nameSport')
         ->get();
         
        return view('/Athlete/show')
        ->with('person', $person);
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
    
    
   public function documents()
    {
        return view('/Inscription/documents')
        ->with('category', category::all())
        ->with('bloodType', bloodType::all()); 
    }
   
   public function search(Request $request){
      $all = person::join ('community','person.IDCommunity','=','community.IDCommunity')
         -> join('athleteCategory','person.IDPerson','=','athleteCategory.IDPerson')
         -> join('category','athleteCategory.IDCategory','=','category.IDCategory')
         -> join('categorySport','category.IDCategory','=','categorySport.IDCategory')
         -> join('sport','categorySport.IDSport','=','sport.IDSport')
         ->select('person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','category.nameCategory','sport.nameSport')
        -> where ('person.name',$request->filter)
        -> orWhere('person.lastName1', $request->filter)
        -> orWhere('person.lastName2', $request->filter)
        -> orWhere('person.IDPerson', $request->filter)
         ->get();
            return view('/Athlete/show')
            ->with('person', $all);
       
    }
    public function delete(Request $request, $IDPerson){
     
      athleteCategory::where('IDPerson' , $IDPerson)->delete();
      athlete::where('IDPerson' , $IDPerson)->delete();
      person::where('IDPerson' , $IDPerson)->delete();
     return $this-> index(); 
}

 public function editAthlete (){
       return view('/Admin/edit');
    }
   
    public function eAthlete (Request $request, $IDPerson){
     
     $eAthlete = person::join ('athlete','person.IDPerson','=','athlete.IDPerson')
         ->select('person.email','person.telephone','person.IDPerson','person.name','person.lastName1','person.lastName2','person.birthDate','athlete.weight', 'athlete.height','person.IDCommunity')
         ->where('person.IDPerson', $IDPerson)->first();
     
        return view('/Admin/edit')
           ->with ('eAthlete', $eAthlete);
    }
    
    public function editA(Request $request){
     person::where('IDPerson', $request->IDPerson)->update(['name' => $request->name,'lastName1' => $request->lastName1,'lastName2' => $request->lastName2, 'birthDate' => $request->birthDate, 'telephone' => $request->telephone, 'email' => $request->email]); 
      athlete::where('IDPerson', $request->IDPerson)->update(['height' => $request->height,'weight' => $request->weight ]); 
   
        return $this->index();
            
    }
    
    public function exist($IDPerson){
    if (Person::where('IDPerson', '=', $IDPerson)->exists()) {
       return 1;
    }else{
       return 0;
    }
  }


}