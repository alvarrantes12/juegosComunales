<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use Storage;
use File;
use App\person;
use App\athlete;
use App\bloodType;
use App\community;
use App\sport;
use App\category;
use App\athleteCategory;
use App\categorySport;


class excelController extends Controller
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

   public function index()
  {
       return view ('/inscriptionByExcel')->with ('sport', Sport::all())->with ('category', Category::all());
  }
  
  public function readExcel (){
      $fileN = session()->get('fileName');
      
      Excel::load('storage/app/public/'.$fileN, function($file)
  {
      
   $result=$file->get();
   $badRegister = 0;
   
   foreach($result as $key => $value)
   {
       if ($value->identificacion != '' && $value->nombre != '' && $value->primer_apellido != '' && $value->segundo_apellido != '' &&
          $value->fecha_nacimiento != '' && $value->tipo_sangre != '' && $value->peso_en_kilos != '' 
          && $value->estatura_en_centimetros != '' ){
            $p = Person::select ('IDPerson')->where('IDPerson',$value->identificacion)->first();
            
            if ($p == null){
           
                $person = new person;
                $person->IDPerson = $value->identificacion;
                $person->name =  $value->nombre;
                $person->lastName1 = $value->primer_apellido;
                $person->lastName2 = $value->segundo_apellido;
                $date = $value->fecha_nacimiento;
                $date->format('Y-m-d');
                $person->birthDate = $date;
                $person->IDRole =  3;
               
                $person->IDCommunity =  session()->get('community');
                $person->active = 1;
                $person->save();
                $athlete = new athlete;
                $athlete->IDPerson = $value->identificacion;
                $bloodType = BloodType::select ('IDBloodType')-> where ('bloodType', $value->tipo_sangre)->first();
                $athlete->IDBloodType = $bloodType->IDBloodType;
                $athlete->weight = $value->peso_en_kilos;
                $athlete->height = $value->estatura_en_centimetros;
                $athlete->IDStatus = 1;
                $athlete->save();
          
                $athleteCategory = new athleteCategory;
                $athleteCategory->IDPerson = $value->identificacion;
                $athleteCategory->IDCategory = session()->get('categoryExcel');
                $athleteCategory->save();
                $categorySport = new categorySport;
                $categorySport->IDCategory = session()->get('categoryExcel');
                $categorySport->IDSport = session()->get('sportExcel');
                $categorySport->save();

            }else{
              $badRegister += 1;
           }
             
                
       }else{
           $badRegister += 1;
       }
   
    
   }
  })->get();
    Storage::disk('public')->delete($fileN);
    return redirect('/showP');
  }
  
  public function save(Request $request)
{
 
       $file = $request->file('file');
       $fileName = $file->getClientOriginalName();
        session(['fileName' => $fileName ]);
       $s = $request->sport;
       $c = $request->category;
        session(['sportExcel' => $s ]);
        session(['categoryExcel' => $c ]);
       Storage::disk('public')->put($fileName,  File::get($file));
       
       $community = $request-> community;
 
       return $this->showFile($fileName);
}

 public function showFile ($fileName){
    
     
     Excel::load('storage/app/public/'.$fileName, function($file)
  {
     
   $result=$file->get();
   
   session(['result' =>  $result]);
  })->get();
  $person = session()->get('result');
  return view ('/showFile')->with('person', $person);
    
 }
  
}
