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
use App\edition;
use App\User;
use App\personEdition;
use Carbon\Carbon;
use App\sportType;
use App\bloodType;




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
    
    
 /**
     * Inscripcion Participantes
     */
  
   public function insertPerson(Request $request)
  {
   $exist = $this-> exist($request->IDPerson);
   
       if(!$exist){
          $person = new person;
          $person->IDPerson = $request->IDPerson;
          $person->name = $request->name;
          $person->lastName1 = $request->lastName1;
          $person->lastName2 = $request->lastName2;
          $person->telephone = $request->telephone;
          $person->email = $request->email;
          $person->gender = $request->gender;
          $person->address = $request->address;
          $person->birthDate = $request->birthDate;
          $person->telephone = $request->telephone;
          $person->IDRole =  $request->role;
          $person->IDCommunity =  $request->community;
          $person->active = 1;
          
          if($request->role == 3){
           session(['person' =>  $person]);
           session(['IDRole' =>  $request->role]);
           session(['IDCommunity' =>   $request->community]);
           session(['IDEdition' =>  $request->IDEdition]);
           
            $date = $request->birthDate;
            
           return $this-> documents()->with('year',$date);
          }else if (($request->role == 2)||($request->role == 1)){
            $person->save();
            $users  = new User;
            $users->IDPerson = $request->IDPerson;
            $users->password = bcrypt($request->IDPerson);
            $users->save();
            
             $request->session()->flash('person', '¡ Perfil creado correctamente!'); 
             
             if($person->IDRole == 1){
              return $this-> showAdmin();
             }else if($person->IDRole == 2){
              return $this-> showDelegados();
             }else if($person->IDRole == 3) {
              return $this-> index();
             }else{
               return $this-> showExtra();
             }
             
          }else{
           $person->save();
            $personEdition = new personEdition;
            $personEdition->IDPerson = $request->IDPerson;
            $personEdition->IDEdition = $request->IDEdition;
            $personEdition->save();
             $request->session()->flash('person', '¡ Perfil creado correctamente!'); 
            if($request->role == 1){
              return $this-> showAdmin();
             }else if($request->role == 2){
              return $this-> showDelegados();
             }else if($request->role == 3) {
              return $this-> index();
             }else{
               return $this-> showExtra();
           } 
          }
       }else{
        
       $request->session()->flash('person', '¡Ya existe un usuario con el numero de identificación ingresdo!');
       if($request->role == 1){
              return $this-> showAdmin();
             }else if($request->role == 2){
              return $this-> showDelegados();
             }else if($request->role == 3) {
              return $this-> index();
             }else{
               return $this-> showExtra();
       } 
     }
   }
   
   public function completeAthleteRegister()
    {
        return view('/Inscription/completeAthleteregister')
        ->with('sport', sport::all())
        ->with('bloodType', bloodType::all());
    }
   
   public function insertPersonByDelegate(Request $request)
  {
   $exist = $this-> exist($request->IDPerson);
   
       if(!$exist){
          $person = new person;
          $person->IDPerson = $request->IDPerson;
          $person->name = $request->name;
          $person->lastName1 = $request->lastName1;
          $person->lastName2 = $request->lastName2;
          $person->telephone = $request->telephone;
          $person->email = $request->email;
          $person->gender = $request->gender;
          $person->address = $request->address;
          $person->birthDate = $request->birthDate;
          $person->telephone = $request->telephone;
          $person->address = $request->address;
          $person->IDRole =  $request->role;
          $person->IDCommunity =  session()->get('community');
          $person->active = 1;
          
          if($request->role == 3){
            session(['person' =>  $person]);
           session(['IDRole' =>  $request->role]);
           session(['IDCommunity' =>  session()->get('community')]);
           session(['IDEdition' =>  $request->IDEdition]);
            $age = $request->birthDate;
           return $this-> completeAthleteRegister()->with("year",$age);
          }
          else{
            $person->save();
            $personEdition = new personEdition;
            $personEdition->IDPerson = $request->IDPerson;
            $personEdition->IDEdition = $request->IDEdition;
            $personEdition->save();
            return $this-> insertPart();
          }
       }else{
       $request->session()->flash('person', '¡Ya existe un usuario con la identificación '+ $request->IDPerson +'!');
       return $this-> insertPart();
     }
   }
   
   public function insertByAthleteDelegate(Request $request)
    {
       $personS = session()->get('person');
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
       $person->gender = $personS->gender;
       $person->birthDate = $personS->birthDate;
       $person->telephone = $personS->telephone;
       $person->address = $personS->address;
       $IDRol =session()->get('IDRole');
       $IDCommunity = session()->get('IDCommunity');
       $person->IDRole =  $IDRol;
       $person->IDCommunity = $IDCommunity;
       $person->active = 1;
       $personEdition = new personEdition;
       $personEdition->IDPerson = $personS->IDPerson;
       $personEdition->IDEdition = session()->get('IDEdition');
       
        $person->save();
        $athlete->save();
        $athleteCategory->save();
        $personEdition->save();
        return $this-> indexDelegate();
    }
   
  
   /**
     * Insercion de atletas
     */
   public function insertDoc(Request $request)
    {
     
     
     $request->file('archivo1')->store('public');
     
     
     
     
     $personS = session()->get('person');
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
       $person->gender = $personS->gender;
       $person->birthDate = $personS->birthDate;
       $person->address = $personS->address;
       
            
       $IDRol = session()->get('IDRole');
       $IDCommunity = session()->get('IDCommunity');
       $person->IDRole =  $IDRol;
       $person->IDCommunity = $IDCommunity;
       $person->active = 1;
       $edition =session()->get('IDEdition');
       $personEdition = new personEdition;
       $personEdition->IDPerson = $personS->IDPerson;
       $personEdition->IDEdition = $edition;
            
        $person->save();
        $athlete->save();
        $athleteCategory->save();
        $personEdition->save();
        $request->session()->flash('athlete', '¡Atleta inscrito correctamente!');
        return $this-> index();
    }
   
   
   public function insertNew()
    {
        return view('/Inscription/insertNew');
    }
    
    public function insertPart()
    {
     $date = Carbon::now();
    $year = $date->format('Y');
    $edition = Edition::select('IDEdition','nameEdition', 'year', 'startDate', 'endDate')->where('year', $year)
                      ->first();
        return view('/Inscription/insertNew')
        
         ->with('role', Role::select('IDRole', 'role')->where('IDRole','!=', 1)->where('IDRole','!=', 2)->get())
         ->with('edition',$edition);
    }
    
   public function insertNewA()
    {
     $date = Carbon::now();
    $year = $date->format('Y');
    $edition = Edition::select('IDEdition','nameEdition', 'year', 'startDate', 'endDate')->where('year', $year)
                      ->first();
        return view('/Admin/insertNew')
        ->with('district', District::all())
        ->with('role', Role::all())
        ->with('community', Community::all())
         ->with('edition',$edition); 
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
           -> join('community','person.IDCommunity','=','community.IDCommunity')
        
         ->select('person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','category.nameCategory','sport.nameSport')
         ->get();
         
        return view('/Athlete/show')
        ->with('person', $person);
    }
    
    
     
    
    public function indexDelegate()
    {
     $person =  sport::join ('categorySport','sport.IDSport','=','categorySport.IDSport')
           -> join('category','categorySport.IDCategory','=','category.IDCategory')
           -> join('athleteCategory','category.IDCategory','=','athleteCategory.IDCategory')
           -> join('person','athleteCategory.IDPerson','=','person.IDPerson')
           -> join('community','person.IDCommunity','=','community.IDCommunity')
        
         ->select('person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','category.nameCategory','sport.nameSport')
         ->get();
         
        return view('/Inscription/show')
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
        ->with('sport', sport::all())
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
    
    public function searchFilter(Request $request){
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
            return view('/Inscription/show')
            ->with('person', $all);
       
    }
    public function delete(Request $request, $IDPerson){
     
      athleteCategory::where('IDPerson' , $IDPerson)->delete();
      athlete::where('IDPerson' , $IDPerson)->delete();
      personEdition::where('IDPerson' , $IDPerson)->delete();
      person::where('IDPerson' , $IDPerson)->delete();
      
     return $this-> index(); 
}

public function deleteByDelegate (Request $request, $IDPerson){
     
      athleteCategory::where('IDPerson' , $IDPerson)->delete();
      athlete::where('IDPerson' , $IDPerson)->delete();
      person::where('IDPerson' , $IDPerson)->delete();
     return $this-> indexDelegate(); 
}

 public function editAthlete (){
       return view('/Admin/edit');
    }
   
    public function editAthleteByDelegate (Request $request, $IDPerson){
     
     $eAthlete = person::join ('athlete','person.IDPerson','=','athlete.IDPerson')
         ->select('person.email','person.telephone','person.IDPerson','person.name','person.lastName1','person.lastName2','person.birthDate','athlete.weight', 'athlete.height','person.IDCommunity')
         ->where('person.IDPerson', $IDPerson)->first();
     $date = Carbon::now();
    $year = $date->format('Y');
    $edition = Edition::select('IDEdition','nameEdition', 'year', 'startDate', 'endDate')->where('year', $year)
                      ->first();
        return view('/Inscription/editAthlete')
           ->with ('eAthlete', $eAthlete)
           ->with ('edition', Edition::select ('IDEdition', 'nameEdition', 'year')->where ('year', $year))
           ->with ('eEdition', $edition);
    }
    
     public function eAthlete (Request $request, $IDPerson){
     
     $eAthlete = person::join ('athlete','person.IDPerson','=','athlete.IDPerson')
         ->select('person.email','person.telephone','person.IDPerson','person.name','person.lastName1','person.lastName2','person.birthDate','athlete.weight', 'athlete.height','person.IDCommunity')
         ->where('person.IDPerson', $IDPerson)->first();
     $date = Carbon::now();
    $year = $date->format('Y');
    $edition = Edition::select('IDEdition','nameEdition', 'year', 'startDate', 'endDate')->where('year', $year)
                      ->first();
        return view('/Admin/edit')
           ->with ('eAthlete', $eAthlete)
           ->with ('edition', Edition::select ('IDEdition', 'nameEdition', 'year')->where ('year', $year))
           ->with ('eEdition', $edition);
    }
    
    public function editA(Request $request){
     person::where('IDPerson', $request->IDPerson)->update(['name' => $request->name,'lastName1' => $request->lastName1,'lastName2' => $request->lastName2, 'birthDate' => $request->birthDate, 'telephone' => $request->telephone, 'email' => $request->email]); 
      athlete::where('IDPerson', $request->IDPerson)->update(['height' => $request->height,'weight' => $request->weight ]); 
      $IDPerson = $request->IDPerson;
      $IDEdition = $request->edition;
      
      if (!$this->existPersonEdition ($IDPerson, $IDEdition)){
       $personEdition = new personEdition;
      $personEdition->IDPerson = $IDPerson;
      $personEdition->IDEdition = $IDEdition;
      $personEdition->save();
        return $this->index();
      }else if ($this->existPersonEdition ($IDPerson, $IDEdition)){
        return $this->index();
      }
       
            
    }
    
    public function updateAthlete (Request $request){
     person::where('IDPerson', $request->IDPerson)->update(['name' => $request->name,'lastName1' => $request->lastName1,'lastName2' => $request->lastName2, 'birthDate' => $request->birthDate, 'telephone' => $request->telephone, 'email' => $request->email]); 
      athlete::where('IDPerson', $request->IDPerson)->update(['height' => $request->height,'weight' => $request->weight ]); 
      $IDPerson = $request->IDPerson;
      $IDEdition = $request->edition;
       if (!$this->existPersonEdition ($IDPerson, $IDEdition)){
      $personEdition = new personEdition;
      $personEdition->IDPerson = $request->IDPerson;
      $personEdition->IDEdition = $request->edition;
      $personEdition->save();
        return $this->indexDelegate();
       }else if ($this->existPersonEdition ($IDPerson, $IDEdition)){
        return $this->indexDelegate();
      }
            
    }
    
    public function exist($IDPerson){
    if (Person::where('IDPerson', '=', $IDPerson)->exists()) {
       return true;
    }else{
       return false;
    }
  }
  
  public function existPersonEdition ($IDPerson, $IDEdition){
    if (personEdition::where('IDPerson', '=', $IDPerson)->where('IDEdition', '=', $IDEdition)->exists()) {
       return true;
    }else{
       return false;
    }
    
  }
  
  /**
     * Metodos para manejo de delegados
     */
  
  
   public function showDelegados()
    {
     $person =  Person::join('community','person.IDCommunity','=','community.IDCommunity')
         ->select('person.IDRole','person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','person.email','person.telephone')
         ->where('person.IDRole', '=', 2)
         ->get();
         
        return view('/Delegado/show')
        ->with('person', $person);
    }

public function searchDelegado(Request $request){
      $all = Person::join('community','person.IDCommunity','=','community.IDCommunity')
         ->select('person.IDRole','person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','person.email','person.telephone')
         ->where('person.IDRole', '=', 2)
         -> where ('person.name',$request->filter)
         -> orWhere('person.lastName1', $request->filter)
         -> orWhere('person.lastName2', $request->filter)
         -> orWhere('person.IDPerson', $request->filter)
         ->get();
            return view('/Delegado/show')
            ->with('person', $all);
       
    }

    public function editDelAdmin (Request $request, $IDPerson){
     $eDelAdmin = Person::join('community','person.IDCommunity','=','community.IDCommunity')
         ->select('person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','person.email','person.telephone')
         ->where('person.IDPerson', $IDPerson)->first();
     
        return view('/Delegado/edit')
           ->with ('eDelAdmin', $eDelAdmin);
    }
    
    public function editDA(Request $request){
     person::where('IDPerson', $request->IDPerson)->update(['name' => $request->name,'lastName1' => $request->lastName1,'lastName2' => $request->lastName2, 'birthDate' => $request->birthDate, 'telephone' => $request->telephone, 'email' => $request->email]); 
     return $this->showDelegados();
            
    }
    
     public function deleteDel(Request $request, $IDPerson){
      user::where('IDPerson' , $IDPerson)->delete();
      person::where('IDPerson' , $IDPerson)->delete();
     return $this-> showDelegados(); 
}



/**
     * Metodos para manejo de administradores
     */
 public function showAdmin()
    {
     $idPerson= session()->get('key');
     $person =  Person::join('community','person.IDCommunity','=','community.IDCommunity')
         ->select('person.IDRole','person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','person.email','person.telephone')
         ->where('person.IDRole', '=', 1)->where('person.IDPerson','!=',$idPerson)
         ->get();
         
        return view('/Administradores/show')
        ->with('person', $person);
    }

public function searchAdministrador(Request $request){
      $all = Person::join('community','person.IDCommunity','=','community.IDCommunity')
         ->select('person.IDRole','person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','person.email','person.telephone')
         ->where('person.IDRole', '=', 1)
         -> where ('person.name',$request->filter)
         -> orWhere('person.lastName1', $request->filter)
         -> orWhere('person.lastName2', $request->filter)
         -> orWhere('person.IDPerson', $request->filter)
         ->get();
            return view('/Administradores/show')
            ->with('person', $all);
       
    }

public function deleteAdmin(Request $request, $IDPerson){
      user::where('IDPerson' , $IDPerson)->delete();
      person::where('IDPerson' , $IDPerson)->delete();
     return $this-> showAdmin(); 
}


 public function editAdmin (Request $request, $IDPerson){
     $eAdmin = Person::join('community','person.IDCommunity','=','community.IDCommunity')
         ->select('person.IDRole','person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','person.email','person.telephone')
         ->where('person.IDRole', '=', 1)
         ->where('person.IDPerson', $IDPerson)->first();
     
        return view('/Administradores/edit')
           ->with ('eAdmin', $eAdmin);
    }
    
    public function editAdministrador(Request $request){
     person::where('IDPerson', $request->IDPerson)->update(['name' => $request->name,'lastName1' => $request->lastName1,'lastName2' => $request->lastName2, 'birthDate' => $request->birthDate, 'telephone' => $request->telephone, 'email' => $request->email]); 
     return $this->showAdmin();
            
    }


public function showExtra()
    {
     $idPerson= session()->get('key');
     $person =  Person::join('community','person.IDCommunity','=','community.IDCommunity')
         -> join('role','person.IDRole','=','role.IDRole')
         ->select('person.IDRole','person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','person.email','person.telephone','role.role')
         ->where('person.IDRole', '!=', 1)
         ->where('person.IDRole', '!=', 2)
         ->where('person.IDRole', '!=', 3)
         ->where('person.IDPerson','!=',$idPerson)
         ->get();
         
        return view('/PersonalExtra/show')
        ->with('person', $person);
    }
    
    public function showExtraDel()
    {
     $community = session()->get('IDCommunity');
     $person =  Person::join('community','person.IDCommunity','=','community.IDCommunity')
         -> join('role','person.IDRole','=','role.IDRole')
         ->select('person.IDRole', 'person.IDCommunity','person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','person.email','person.telephone','role.role')
         ->where('person.IDCommunity', '=', $community)
         ->where('person.IDRole', '!=', 1)
         ->where('person.IDRole', '!=', 2)
         ->where('person.IDRole', '!=', 3)
         
         ->get();
         
        return view('/Inscription/showNoAthletes')
        ->with('person', $person);
    }

public function searchExtra(Request $request){
      $all = Person::join('community','person.IDCommunity','=','community.IDCommunity')
         -> join('role','person.IDRole','=','role.IDRole')
         ->select('person.IDRole','person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','person.email','person.telephone','role.role')
        ->where('person.IDRole', '!=', 1)
         ->where('person.IDRole', '!=', 2)
         ->where('person.IDRole', '!=', 3)
         -> where ('person.name',$request->filter)
         -> orWhere('person.lastName1', $request->filter)
         -> orWhere('person.lastName2', $request->filter)
         -> orWhere('role.role', $request->filter)
         -> orWhere('person.IDPerson', $request->filter)
         ->get();
            return view('/PersonalExtra/show')
            ->with('person', $all);
       
    }
    
    public function searchExtraDel(Request $request){
      $all = Person::join('community','person.IDCommunity','=','community.IDCommunity')
         -> join('role','person.IDRole','=','role.IDRole')
         ->select('person.IDRole','person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','person.email','person.telephone','role.role')
        ->where('person.IDRole', '!=', 1)
         ->where('person.IDRole', '!=', 2)
         ->where('person.IDRole', '!=', 3)
         -> where ('person.name',$request->filter)
         -> orWhere('person.lastName1', $request->filter)
         -> orWhere('person.lastName2', $request->filter)
         -> orWhere('role.role', $request->filter)
         -> orWhere('person.IDPerson', $request->filter)
         ->get();
            return view('/Inscription/showNoAthletes')
            ->with('person', $all);
       
    }
    
     public function editExtraDel (Request $request, $IDPerson){
     $eExtra = Person::join('community','person.IDCommunity','=','community.IDCommunity')
         -> join('role','person.IDRole','=','role.IDRole')
         ->select('person.IDRole','person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','community.nameCommunity','person.email','person.telephone','role.role')
         ->where('person.IDPerson', $IDPerson)->first();
     
        return view('/Inscription/editNoAthlete')
           ->with ('eExtra', $eExtra);
    }
    
    public function editExtraS (Request $request){
     person::where('IDPerson', $request->IDPerson)->update(['name' => $request->name,'lastName1' => $request->lastName1,'lastName2' => $request->lastName2, 'birthDate' => $request->birthDate, 'telephone' => $request->telephone, 'email' => $request->email]); 
     return $this->showExtra();
            
    }
    
     public function editExtraDele (Request $request){
     person::where('IDPerson', $request->IDPerson)->update(['name' => $request->name,'lastName1' => $request->lastName1,'lastName2' => $request->lastName2, 'birthDate' => $request->birthDate, 'telephone' => $request->telephone, 'email' => $request->email]); 
     return $this->showExtraDel();
            
    }

public function deleteExtra(Request $request, $IDPerson){
      person::where('IDPerson' , $IDPerson)->delete();
     return $this-> showExtra(); 
}

public function deleteExtraDel(Request $request, $IDPerson){
      person::where('IDPerson' , $IDPerson)->delete();
     return $this-> showExtraDel(); 
}

public function editPerfil (){
 $IDPerson =  session()->get('key');
 
     $ePerfil = Person:: select('person.name','person.lastName1','person.lastName2','person.IDPerson','person.birthDate','person.email','person.telephone','person.IDRole')
         ->where('person.IDPerson', $IDPerson)->first();
       
       if($ePerfil->IDRole == 1){
        return view('/Admin/editPerfil')
           ->with ('ePerfil', $ePerfil);
       }else{
         return view('/Delegado/editPerfil')
           ->with ('ePerfil', $ePerfil);
        
       }    
    }
    
    public function editPerfill(Request $request){
     person::where('IDPerson', $request->IDPerson)->update(['name' => $request->name,'lastName1' => $request->lastName1,'lastName2' => $request->lastName2, 'birthDate' => $request->birthDate, 'telephone' => $request->telephone, 'email' => $request->email]); 
     if($request->password != ""){
     user::where('IDPerson', $request->IDPerson)->update(['password' =>  bcrypt($request->password)]);
     $request->session()->flash('perfil', '¡ Perfil actualizado correctamente!'); 
     
     if($request->IDRole == 1){
     return redirect('/adminMasterPageSlider');
     }else{
      return redirect('/masterPageSlider');
     }
     
     }else{
     $request->session()->flash('perfil', '¡ Perfil actualizado correctamente!'); 
     
     
     if($request->IDRole == 1){
     return redirect('/adminMasterPageSlider');
     }else{
      return redirect('/masterPageSlider');
     }
     
     
     }  
    }
    
}