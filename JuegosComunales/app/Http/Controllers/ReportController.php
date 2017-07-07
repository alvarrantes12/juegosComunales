<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\district;
use App\community;
use App\sport;
use App\category;
use App\person;
use App\athlete;
use App\edition;
use App\athleteCategory;
use App\sportCategory;
class ReportController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
         public function index()
    {
        return view('/Report/show')->with('district', District::all())
        -> with('sport', Sport::all())
        -> with('edition', edition::all());
    }
    
    public function indexSport()
    {
        return view('/Report/chooseSport')-> with('sport', Sport::all())
        -> with('edition', edition::all());
        
    }
    public function indexCommunity()
    { 
        return view('/Report/chooseCommunity')
        -> with('district', District::all())
        -> with('edition', edition::all());
        
    }
    public function indexEdition()
    {
        return view('/Report/chooseEdition')-> with('edition', edition::all());
    }
    
    public function indexDelegate()
    {
        return view('/Report/showDel')
         -> with('edition', edition::all())
        -> with('sport', Sport::all());
   
    }
    public function add(){
        return view('/Canton/new');   
        
    }
    
     public function crearPDF($datos,$vistaurl,$community, $category, $edition)
     { 
    $edition= $edition->nameEdition;
     $data = $datos;
     $category1=$category->nameCategory;
     $community1 = $community->nameCommunity;
     $sport = $category->nameSport;
     $date = date('Y-m-d');
     $view =  \View::make($vistaurl, compact('data', 'date', 'community1', 'category1', 'sport','edition'))->render();
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($view);
        
    return $pdf->stream('Reporte '.$date);
    
     }
     
      public function crearSportPDF($datos,$vistaurl,$sport, $edition)
     { 
    $edition= $edition->nameEdition;
     $data = $datos;
     $sport1 =$sport->nameSport;
     $date = date('Y-m-d');
     $view =  \View::make($vistaurl, compact('data', 'date', 'sport1','edition'))->render();
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($view);
        
    return $pdf->stream('Reporte '.$date);
    
     }
     
     
     public function communityPDF($datos,$vistaurl,$community,$edition)
     { 
    $edition= $edition->nameEdition;
     $data = $datos;
     $community =$community->nameCommunity;
     $date = date('Y-m-d');
     $view =  \View::make($vistaurl, compact('data', 'date', 'community','edition'))->render();
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($view);
        
    return $pdf->stream('Reporte_Comunal '.$date);
    
     }
      public function editionPDF($datos,$vistaurl,$edition)
     { 

     $data = $datos;
     $edition =$edition->nameEdition;
     $date = date('Y-m-d');
     $view =  \View::make($vistaurl, compact('data', 'date', 'edition'))->render();
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($view);
        
    return $pdf->stream('Reporte_Comunal '.$date);
    
     }
     
     
     public function generate(Request $request){

     $vistaurl= "/Report/report";
     $report= athlete::join('person','athlete.IDPerson','=','person.IDPerson')
     ->join('community','person.IDCommunity','=','community.IDCommunity')
     ->join('communityDistrict','community.IDCommunity','=','communityDistrict.IDCommunity')
     ->join('district','communityDistrict.IDDistrict','=','district.IDDistrict')
     ->join ('athleteCategory','athlete.IDPerson','=','athleteCategory.IDPerson')
      ->join('personEdition','person.IDPerson','personEdition.IDPerson')
     ->select('person.name','person.lastName1','person.lastName2','person.IDPerson', 'person.gender', 'community.nameCommunity')
     ->where ('community.IDCommunity', $request->community)
     ->where ('athleteCategory.IDCategory', $request->category)
      ->where('personEdition.IDEdition', $request->edition)
    ->get();
    $community = community::select('nameCommunity')
    ->where('IDCommunity',$request->community)->first();
     
      $category = category::join('categorySport','category.IDCategory','=','categorySport.IDCategory')
      ->join('sport','categorySport.IDSport','=','sport.IDSport')
      -> select('category.nameCategory', 'sport.nameSport')
    ->where('category.IDCategory',$request->category)->first();
      $edition = Edition::select('nameEdition')->where('IDEdition',  $request->edition)->first();
    return $this->crearPDF($report, $vistaurl, $community, $category, $edition);

 }
 public function generateSport (Request $request){
      $vistaurl= "/Report/reportSport";
      $report = person::join('athlete','person.IDPerson','=','athlete.IDPerson')
     ->join('athleteCategory','athlete.IDPerson','=','athleteCategory.IDPerson')
     ->join('category','athleteCategory.IDCategory','=','category.IDCategory')
     ->join('categorySport','category.IDCategory','=','categorySport.IDCategory')
     ->join('sport','categorySport.IDSport','sport.IDSport')
     ->join('personEdition','person.IDPerson','personEdition.IDPerson')
     ->select('person.name','person.lastName1','person.lastName2','person.IDPerson', 'person.gender')
     ->where('sport.IDSport', $request->sport)
     ->where('personEdition.IDEdition', $request->edition)->get();
      $edition = Edition::select('nameEdition')->where('IDEdition',  $request->edition)->first();
     $sport = sport::select('nameSport')->where('IDSport',  $request->sport)->first();
      return $this->crearSportPDF($report, $vistaurl, $sport,$edition);
 }
 public function generateEdition (Request $request){
     $vistaurl= "/Report/reportEdition";
      $report = person::join('athlete','person.IDPerson','=','athlete.IDPerson')
     ->join('athleteCategory','athlete.IDPerson','=','athleteCategory.IDPerson')
     ->join('category','athleteCategory.IDCategory','=','category.IDCategory')
     ->join('categorySport','category.IDCategory','=','categorySport.IDCategory')
     ->join('sport','categorySport.IDSport','sport.IDSport')
     ->join('community','person.IDCommunity','community.IDCommunity')
     ->join('communityDistrict','community.IDCommunity','communityDistrict.IDCommunity')
     ->join('district','communityDistrict.IDDistrict','district.IDDistrict')
     ->join('personEdition','person.IDPerson','personEdition.IDPerson')
     ->select('person.name','person.lastName1','person.lastName2','person.IDPerson', 'person.gender', 'district.nameDistrict','community.nameCommunity', 'sport.nameSport', 'category.nameCategory')
     ->where('personEdition.IDEdition', $request->edition)->get();
     $edition = Edition::select('nameEdition')->where('IDEdition',  $request->edition)->first();
      return $this->editionPDF($report, $vistaurl, $edition);
 }
 public function generateCommunity(Request $request){
     $vistaurl= "/Report/reportCommunity";
      $report = person::join('athlete','person.IDPerson','=','athlete.IDPerson')
     ->join('athleteCategory','athlete.IDPerson','=','athleteCategory.IDPerson')
     ->join('category','athleteCategory.IDCategory','=','category.IDCategory')
     ->join('categorySport','category.IDCategory','=','categorySport.IDCategory')
     ->join('sport','categorySport.IDSport','sport.IDSport')
     ->join('community','person.IDCommunity','community.IDCommunity')
     ->join('personEdition','person.IDPerson','personEdition.IDPerson')
     ->select('person.name','person.lastName1','person.lastName2','person.IDPerson', 'person.gender', 'sport.nameSport','category.nameCategory')
     ->where('community.IDCommunity', $request->community)
     ->where('personEdition.IDEdition', $request->edition)->get();
      $edition = Edition::select('nameEdition')->where('IDEdition',  $request->edition)->first();
     $community = community::select('nameCommunity')->where('IDCommunity',  $request->community)->first();
      return $this->communityPDF($report, $vistaurl, $community, $edition);
 }
 


 public function generateReport(Request $request){
   $community2 = session()->get('community');

     $vistaurl= "/Report/report";
     $report= athlete::join('person','athlete.IDPerson','=','person.IDPerson')
     ->join('community','person.IDCommunity','=','community.IDCommunity')
     ->join('communityDistrict','community.IDCommunity','=','communityDistrict.IDCommunity')
     ->join('district','communityDistrict.IDDistrict','=','district.IDDistrict')
     ->join ('athleteCategory','athlete.IDPerson','=','athleteCategory.IDPerson')
     ->join('personEdition','person.IDPerson','personEdition.IDPerson')
     ->select('person.name','person.lastName1','person.lastName2','person.IDPerson', 'person.gender', 'community.nameCommunity')
     ->where ('community.IDCommunity', $community2)
     ->where ('athleteCategory.IDCategory', $request->category)
     ->where('personEdition.IDEdition', $request->edition)
    ->get();
     $edition = Edition::select('nameEdition')->where('IDEdition',  $request->edition)->first();
    $community = community::select('nameCommunity')
    ->where('IDCommunity',$community2)->first();
     
      $category = category::join('categorySport','category.IDCategory','=','categorySport.IDCategory')
      ->join('sport','categorySport.IDSport','=','sport.IDSport')
      -> select('category.nameCategory', 'sport.nameSport')
    ->where('category.IDCategory',$request->category)->first();
     
    return $this->crearPDF($report, $vistaurl, $community, $category, $edition);

 }


}
