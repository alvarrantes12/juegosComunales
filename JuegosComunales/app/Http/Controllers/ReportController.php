<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\district;
use App\community;
use App\sport;
use App\category;
use App\person;
use App\athlete;
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
        -> with('sport', Sport::all());
    }
    
    
    public function indexDelegate()
    {
        return view('/Report/showDel')
        -> with('sport', Sport::all());
   
    }
    public function add(){
        return view('/Canton/new');   
        
    }
    
    

   


     public function crearPDF($datos,$vistaurl,$community, $category)
     { 

     $data = $datos;
     $category1=$category->nameCategory;
     $community1 = $community->nameCommunity;
     $sport = $category->nameSport;
     $date = date('Y-m-d');
     $view =  \View::make($vistaurl, compact('data', 'date', 'community1', 'category1', 'sport'))->render();
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($view);
        
    return $pdf->stream('Reporte '.$date);
    
     }
     
     public function generate(Request $request){

     $vistaurl= "/Report/report";
     $report= athlete::join('person','athlete.IDPerson','=','person.IDPerson')
     ->join('community','person.IDCommunity','=','community.IDCommunity')
     ->join('communityDistrict','community.IDCommunity','=','communityDistrict.IDCommunity')
     ->join('district','communityDistrict.IDDistrict','=','district.IDDistrict')
     ->join ('athleteCategory','athlete.IDPerson','=','athleteCategory.IDPerson')
     ->select('person.name','person.lastName1','person.lastName2','person.IDPerson', 'person.gender', 'community.nameCommunity')
     ->where ('community.IDCommunity', $request->community)
     ->where ('athleteCategory.IDCategory', $request->category)
    ->get();
    $community = community::select('nameCommunity')
    ->where('IDCommunity',$request->community)->first();
     
      $category = category::join('categorySport','category.IDCategory','=','categorySport.IDCategory')
      ->join('sport','categorySport.IDSport','=','sport.IDSport')
      -> select('category.nameCategory', 'sport.nameSport')
    ->where('category.IDCategory',$request->category)->first();
     
    return $this->crearPDF($report, $vistaurl, $community, $category);

 }


 public function generateReport(Request $request){
   $community2 = session()->get('community');

     $vistaurl= "/Report/report";
     $report= athlete::join('person','athlete.IDPerson','=','person.IDPerson')
     ->join('community','person.IDCommunity','=','community.IDCommunity')
     ->join('communityDistrict','community.IDCommunity','=','communityDistrict.IDCommunity')
     ->join('district','communityDistrict.IDDistrict','=','district.IDDistrict')
     ->join ('athleteCategory','athlete.IDPerson','=','athleteCategory.IDPerson')
     ->select('person.name','person.lastName1','person.lastName2','person.IDPerson', 'person.gender', 'community.nameCommunity')
     ->where ('community.IDCommunity', $community2)
     ->where ('athleteCategory.IDCategory', $request->category)
    ->get();
    $community = community::select('nameCommunity')
    ->where('IDCommunity',$community2)->first();
     
      $category = category::join('categorySport','category.IDCategory','=','categorySport.IDCategory')
      ->join('sport','categorySport.IDSport','=','sport.IDSport')
      -> select('category.nameCategory', 'sport.nameSport')
    ->where('category.IDCategory',$request->category)->first();
     
    return $this->crearPDF($report, $vistaurl, $community, $category);

 }


}
