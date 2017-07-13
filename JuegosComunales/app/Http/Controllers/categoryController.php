<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use App\sport;
use App\categorySport;

class categoryController extends Controller
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
        $all = category::join('categorySport', 'category.IDCategory', '=' , 'categorySport.IDCategory')
                    -> join('sport', 'categorySport.IDSport', '=', 'sport.IDSport')
                     ->select('category.nameCategory', 'category.IDCategory', 'category.active', 'category.startAge','category.endAge','sport.nameSport')
                      ->get();
           return view('/Category/show')
         ->with ('category', $all);
    }
    
     public function insertCategory(){
        return view('/Category/new')
         ->with ('sport', Sport::all());
    }
    
     public function insertNewCategory(Request $request)
  {
      $exist = $this-> exist($request-> category);
      
      if(!$exist){
      $category = new category;
       $category->nameCategory = $request-> category;
        $category->active = 1;
         $category->startAge = $request-> startAge;
          $category->endAge = $request-> endAge;
          
        $category->save();
       $this-> relateCategory($request->category, $request->sport);
       $request->session()->flash('category', '¡Categoría creada correctamente!');
      return $this->index();
      }else{
      $request->session()->flash('category', '¡Ya existe una categoria con este nombre!'); 
      return $this -> insertCategory ();  
      }
      
  }   
  
  public function relateCategory($category, $sport){
      $idCategory = Category::select('IDCategory') -> where ('nameCategory', $category)->first();
      $categorySport = new categorySport;
      $categorySport->IDCategory = $idCategory -> IDCategory;
      $categorySport->IDSport = $sport;
      $categorySport->save();
  } 
  
  public function editCategory(Request $request, $IDCategory){
           $category = Category::join ('categorySport', 'category.IDCategory' , '=', 'categorySport.IDCategory' )
            ->join ('sport', 'categorySport.IDSport', '=',  'sport.IDSport' )
               ->select('sport.nameSport','sport.IDSport','category.IDCategory', 
               'category.nameCategory', 'category.startAge', 'category.endAge', 'category.active')->where('category.IDCategory', $IDCategory)
                      ->first();
       
        return view('/Category/edit')
            ->with ('eCategory', $category)
              ->with ('sport', Sport::all());
        
            return $this->index();
    }
     public function deleteCategory($IDCategory){
      if($this->active($IDCategory)){
        Category::where('IDCategory', $IDCategory)
          ->update(['active' => 0]);
          return $this->index();
    }else{
        Category::where('IDCategory', $IDCategory)
          ->update(['active' => 1]);
          return $this->index();
    }}
    
     private function active($IDCategory){
       $cat = category::select('active')->where('IDCategory', $IDCategory)->get();
       $c = $cat[0]->active;
       if($c == 0){
           return false;
       }else{
           return true;
       }
        
    }
    
    public function getAge($idCategory){
        $age = category::select('startAge', 'endAge')->where('IDCategory', $idCategory)->get();
        return $age;
    }
    
    public function search (Request $request){
         $all = category::where('nameCategory', $request->filter)
        ->get();
            return view('/Category/show')
            ->with('category', $all);
       
    }
    
    
    public function edit (Request $request){
        Category::where('IDCategory', $request->IDCategory)->update(['nameCategory' => $request->nameCategory,
        'startAge' => $request->startAge, 'endAge' => $request->endAge]);
        categorySport::where ('IDCategory', $request->IDCategory)->update(['IDSport' => $request->sport]);
         $request->session()->flash('category', '¡Categoría  editada correctamente!');
        return $this->index();
    }
  
    public function exist($nameCategory){
    if (Category::where('nameCategory', '=', $nameCategory)->exists()) {
       return true;
    }else{
       return false;
    }
  }
 
}
