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
    public function add(){
        return view('/Canton/new');   
        
    }

   


     public function crearPDF($datos,$vistaurl)
     { 

     $data = $datos;
     $date = date('Y-m-d');
     $view =  \View::make($vistaurl, compact('data', 'date'))->render();
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($view);
        
    return $pdf->stream('reporte');
    //     if($tipo==2){return $pdf->download('reporte.pdf'); }
     }


 public function generate(Request $request){

     $vistaurl= "/Report/report";
     $report= athlete::join('person','athlete.IDPerson','=','person.IDPerson')
     ->join('community','person.IDCommunity','=','community.IDCommunity')
     ->join('communityDistrict','community.IDCommunity','=','communityDistrict.IDCommunity')
     ->join('district','communityDistrict.IDDistrict','=','district.IDDistrict')
     ->join('athleteCategory','athlete.IDPerson','=','athleteCategory.IDPerson')
     ->join('category','athleteCategory.IDPerson','=','category.IDCategory')
     ->join('categorySport','category.IDCategory','=','categorySport.IDCategory')
     ->join('sport','categorySport.IDSport','=','sport.IDSport')
     ->select('sport.nameSport','category.nameCategory','person.name','person.lastName1','person.lastName2','person.IDPerson', 'person.gender')
     ->where ('community.IDCommunity', $request->community)
     ->where('category.IDCategory',$request->category)
     
    ->get();
     
    return $this->crearPDF($report, $vistaurl);




 }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
