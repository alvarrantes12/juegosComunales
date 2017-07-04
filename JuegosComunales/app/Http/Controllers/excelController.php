<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Excel;
use Storage;
use File;
use App\person;
use App\athlete;
use App\bloodType;
use App\community;
use App\district;
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
       return view ('/inscriptionByExcel')->with ('sport', Sport::all())->with ('category', Category::all())->with ('community', Community::all())->with ('district', District::all());
  }
  
  public function indexDelegate()
  {
       return view ('/inscriptionByExcelDelegate')->with ('sport', Sport::all())->with ('category', Category::all());
  }
  
  public function readExcel (){
      $fileN = session()->get('fileName');
      
      
       $userType = session()->get('IDRole');
        if ($userType == 1){
      Excel::load('storage/app/public/'.$fileN, function($file)
  {
      
   $result=$file->get();
   $badRegister = 0;
   
   foreach($result as $key => $value)
   {
      if ($value->identificacion != '' && $value->nombre != '' && $value->primer_apellido != '' && $value->segundo_apellido != '' &&
          $value->fecha_nacimiento != '' && $value->tipo_sangre != '' && $value->peso_en_kilos != '' 
          && $value->estatura_en_centimetros != '' && $value->genero != ""  && $value->direccion != "" ){
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
                $person->gender = $value->genero;
                $person->IDRole =  3;
               
                $person->IDCommunity =  session()->get('community');
                $person->active = 1;
                $person->address = $value->direccion;
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
  }else{
      Excel::load('storage/app/public/'.$fileN, function($file)
  {
      
   $result=$file->get();
   $badRegister = 0;
   
   foreach($result as $key => $value)
   {
      if ($value->identificacion != '' && $value->nombre != '' && $value->primer_apellido != '' && $value->segundo_apellido != '' &&
          $value->fecha_nacimiento != '' && $value->tipo_sangre != '' && $value->peso_en_kilos != '' 
          && $value->estatura_en_centimetros != '' && $value->genero != "" && $value->direccion != "" ){
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
                $person->gender = $value->genero;
                $person->IDRole =  3;
               
                $person->IDCommunity =  session()->get('community');
                $person->active = 1;
                $person->address = $value->direccion;
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
               

            }else{
              $badRegister += 1;
           }
             
                
       }else{
           $badRegister += 1;
       }
    
   }
  })->get();
    Storage::disk('public')->delete($fileN);
    return redirect('/showAthletes');
  }
  }
  
  public function save(Request $request)
{
    $mime = $request->file('file')->getMimeType();
     $userType = session()->get('IDRole');
    if ($mime == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
        $file = $request->file('file');
       $fileName = $file->getClientOriginalName();
       
        session(['fileName' => $fileName ]);
       
        if ($userType == 1){
            $s = $request->sport;
            $c = $request->category;
            $com = $request->community;
            session(['sportExcel' => $s ]);
            session(['categoryExcel' => $c ]);
            session(['communityExcel' => $com ]);
            Storage::disk('public')->put($fileName,  File::get($file));

            return $this->showFile($fileName);
        }else{
            $s = $request->sport;
            $c = $request->category;
           
            session(['sportExcel' => $s ]);
            session(['categoryExcel' => $c ]);
            Storage::disk('public')->put($fileName,  File::get($file));

            return $this->showFile($fileName);
        }
    }else{
         if ($userType == 1){
        $request->session()->flash('fileError', '¡El formato del archivo que intentó subir es incorrecto, debe ser una hoja de cálculo!');
        return redirect('/excel');
         }else{
              $request->session()->flash('fileErrorDel', '¡El formato del archivo que intentó subir es incorrecto, debe ser una hoja de cálculo!');
        return redirect('/excelUpload');
         }
    }
       
       
        
}

 public function showFile ($fileName){
    
     
     Excel::load('storage/app/public/'.$fileName, function($file)
  {
     
   $result=$file->get();
   
   session(['result' =>  $result]);
  })->get();
    $userType = session()->get('IDRole');
     $person = session()->get('result');
   if ($userType == 1){
       
        return view ('/showFile')->with('person', $person);
        }else{
       
  return view ('/showFileDelegate')->with('person', $person);
        }
  
    
 }
 

    
    public function downloadExcelSheet (){
     return response()->download(storage_path("app/PlantillaExcel.xlsx"));
    }

}
