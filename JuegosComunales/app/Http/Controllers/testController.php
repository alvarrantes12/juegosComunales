<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\test;
use App\category;
use App\categoryTest;
use App\sport;

class testController extends Controller
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
        $all = test::join('categoryTest', 'test.IDTest', '=' , 'categoryTest.IDTest')
                    -> join('category', 'categoryTest.IDCategory', '=', 'category.IDCategory')
                    ->join('categorySport','category.IDCategory','=','categorySport.IDCategory')
                    -> join ('sport', 'categorySport.IDSport','=','sport.IDSport')
                    ->select('nameCategory', 'nameTest', 'nameSport', 'test.IDTest')
                      ->get();
        return view('/Test/show')
            ->with ('test', $all);
    }
    
     public function insertTest(){
        return view('/Test/new')
            ->with ('category', Category::all())
            ->with ('sport', Sport::all());
    }

  
  public function insertNewTest(Request $request)
  {
      $test = new test;
      $test->nameTest = $request-> testName;
      $test->save();
      $this-> relateTest($request->category, $request->testName);
      return $this->index();

  }   
  
   public function relateTest($category, $testName ){
      $idTest = Test::select('IDTest') -> where ('nameTest', $testName)->first();
      $categoryTest = new categoryTest;
      $categoryTest->IDTest = $idTest -> IDTest;
      $categoryTest->IDCategory = $category;
      $categoryTest->save();
  }
  
  public function deleteTest($IDTest){
      categoryTest::where('IDTest', $IDTest)->delete();
      test::where('IDTest', $IDTest)->delete();
        return $this -> index();
    }
    
    public function edit($IDTest){
    $all = test::join('categoryTest', 'test.IDTest', '=' , 'categoryTest.IDTest')
                    -> join('category', 'categoryTest.IDCategory', '=', 'category.IDCategory')
                    ->join('categorySport','category.IDCategory','=','categorySport.IDCategory')
                    -> join ('sport', 'categorySport.IDSport','=','sport.IDSport')
                    ->select('nameCategory', 'nameTest', 'nameSport', 'test.IDTest', 'sport.IDSport', 'category.IDCategory')
                    ->where('test.IDTest',$IDTest )
                      ->first();
        return view('/Test/edit')
            ->with ('test', $all)
              ->with ('sport', Sport::all())
              ->with('category',Category::all());
    }
    
    public function editTest (Request $request){
        test::where('IDTest', $request->IDTest)->update(['nameTest' => $request->testName]);
        categoryTest::where ('IDTest', $request->IDTest)->update(['IDCategory' => $request->category]);
    
        return $this->index();
    }
    
     public function search (Request $request){
          $all = test::join('categoryTest', 'test.IDTest', '=' , 'categoryTest.IDTest')
                    -> join('category', 'categoryTest.IDCategory', '=', 'category.IDCategory')
                    ->join('categorySport','category.IDCategory','=','categorySport.IDCategory')
                    -> join ('sport', 'categorySport.IDSport','=','sport.IDSport')
                    ->select('nameCategory', 'nameTest', 'nameSport')
                    ->where('nameTest', $request->filter)
                    ->orWhere('nameSport', $request->filter)
                    ->orWhere('nameCategory', $request->filter)
                    ->get();
      
            return view('/Test/show')
            ->with('test', $all);
       
     }
     
     public function getCategory($IDSport){
         $category = category::join('categorySport', 'category.IDCategory', '=', 'categorySport.IDCategory')
         ->select('category.IDCategory', 'category.nameCategory')->where('categorySport.IDSport', $IDSport)->get();
         
         return  $category;
     }
  
  
}
