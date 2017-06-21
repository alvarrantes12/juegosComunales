<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function () {
    return view('/auth/login');
});


Route::get('masterPage', function () {
    return view('masterPage');
});

Route::get('adminMasterPageSlider', function () {
    return view('adminMasterPageSlider');
});

Route::get('adminMasterPage', function () {
    return view('adminMasterPage');
});

Route::get('masterPageSlider', function () {
    return view('masterPageSlider');
});

Route::get('newAthlete', function () {
    return view('newAthlete');
});

Route::get('/home', 'HomeController@index')->name('homePage');

Route::get('/newCo','insertNewController@insertNew');
Route::get('/newDoc','insertNewController@documents');
Route::get('/querys','insertNewController@querys');
Route::get('/homePage','HomeController@index');

//Ruta que se encarga de redireccionar el login por primera vez
Route::get('/completeRegister', function () {
    return view('/auth/loginFirstTime');
});
Route::post ('/saveCompleteRegister', 'loginFController@registerFirstTime');
Route::get ('/loginData', 'loginFController@loginData');


// Rutas que se encargan del IMEC de Categoría.
Route::get('/category', 'categoryController@index');
Route::get('/insertCategory', 'categoryController@insertCategory');
Route::post('/insertNewCategory', 'categoryController@insertNewCategory');
Route::get('/deleteCategory/{IDCategory}', 'categoryController@deleteCategory');
Route::get('/editCategory/{IDCategory}', 'categoryController@editCategory');
Route::post('/editCategory', 'categoryController@edit');
Route::post('/searchCategory', 'categoryController@search');


//Rutas que se encargan del IMEC de Edición.
Route::get('/edition', 'editionController@index');
Route::get('/insertEdition', 'editionController@insertEdition');
Route::post('/insertNewEdition', 'editionController@insertNewEdition');
Route::get('/deleteEdition/{IDEdition}', 'editionController@deleteEdition');
Route::get('/editEdition/{IDEdition}', 'editionController@editEdition');
Route::post('/editEdition', 'editionController@eEdition');
Route::post('/searchEdition', 'editionController@search');

//Rutas que se encargan del IMEC de Pruebas.
Route::get('/test', 'testController@index');
Route::get('/insertTest', 'testController@insertTest');
Route::post('/insertNewTest', 'testController@insertNewTest');
Route::get('/deleteTest/{IDTest}', 'testController@deleteTest');
Route::get('/editTest/{IDTest}', 'testController@edit');
Route::post('/editTest', 'testController@editTest');
Route::post('/searchTest', 'testController@search');
Route::get('/getCategory/{sport}', 'testController@getCategory');

//Rutas que se encargan del IMEC de Deportes.
Route::get('/sport', 'sportController@index');
Route::get('/insertSport', 'sportController@insertSport');
Route::post('/insertNewSport', 'sportController@insertNewSport');
Route::get('/editSport/{IDSport}', 'sportController@editSport');
Route::get('/deleteSport/{IDSport}', 'sportController@deleteSport');
Route::get('/editSport/{IDEdition}', 'sportController@editSport');
Route::post('/editSport', 'sportController@eSport');
Route::post('/searchSport', 'sportController@search');

// Rutas que se encargan del IMEC de Distrito.
Route::get('/showDistrict', 'districtController@index');
Route::get('/addDistrict', 'districtController@add');
Route::post('/newDistrict','districtController@newDistrict');
Route::get('/deleteDistrict/{IDDistrict}', 'districtController@delete');
Route::get('/editDistrict/{IDDistrict}', 'districtController@edit');
Route::post('/editDistrict', 'districtController@editDistrict');
Route::post('/searchDistrict', 'districtController@search');

// Rutas que se encargan del IMEC de Comunidad.
Route::post('/newCommunity','communityController@newCommunity');
Route::get('/addCommunity', 'communityController@add');
Route::get('/community', 'communityController@index');
Route::get('/deleteCommunity/{IDCommunity}', 'communityController@delete');
Route::get('/editCommunity/{IDCommunity}', 'communityController@edit');
Route::post('/editCommunity', 'communityController@editCommunity');
Route::get('/searchCommunity', 'communityController@search');
Route::get('/getCommunity/{district}', 'communityController@getCommunity');


// Rutas que se encargan del IMEC de Rol de Usuario.
Route::get('/showRol','roleController@showRole');
Route::post('/insertR','roleController@insertRole');
Route::get('/addRol','roleController@insertView');
Route::get('/showRol','roleController@showRole');
Route::get('/deleteRole/{IDRole}','roleController@deleteRole');
Route::get('/showU','userController@showUser');
Route::get('/upRol','roleController@updateRole');

//Rutas que se encargan de la generación de reportes
Route::get('/report', 'ReportController@index');
Route::post('/generatePDF','ReportController@generate');


// Rutas que se encargan del IMEC de Participantes.
Route::get('/showP', 'personController@index');
Route::get('/newCo','personController@insertNew');
Route::get('/newDoc','personController@documents');
Route::get('/newCoa','personController@insertNewA');
Route::post('/insertA','personController@insertPerson');
Route::post('/insertDoc','personController@insertDoc');
Route::post('/searchPerson', 'personController@search');
Route::get('/deleteAthlete/{IDPerson}', 'personController@delete');
Route::get('/upAthlete', 'personController@editAthlete');




Route::get('/editAthlete/{IDPerson}', 'personController@eAthlete');
Route::post('/editA', 'personController@editA');


//Rutas resetPassword
Route::post ('/resetPassword', 'Auth\ResetPasswordController@updatePassword');

Route::get ('/excel', 'excelController@index');
Route::get ('/excelData', 'excelController@readExcel');
Route::get ('/showExcelData', 'excelController@showFile');
Route::post ('/saveExcel', 'excelController@save');

