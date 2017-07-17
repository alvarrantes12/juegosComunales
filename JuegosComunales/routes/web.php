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
Route::get('/getAge/{IDCategory}', 'categoryController@getAge');

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
Route::get('/getTest/{category}', 'testController@getTest');
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

Route::get('/deleteDistrictt/{IDDistrict}', 'districtController@deleteD');



// Rutas que se encargan del IMEC de Comunidad.
Route::post('/newCommunity','communityController@newCommunity');
Route::get('/addCommunity', 'communityController@add');
Route::get('/community', 'communityController@index');
Route::get('/deleteCommunity/{IDCommunity}', 'communityController@delete');
Route::get('/editCommunity/{IDCommunity}', 'communityController@edit');
Route::post('/editCommunity', 'communityController@editCommunity');
Route::get('/searchCommunity', 'communityController@search');
Route::get('/getCommunity/{district}', 'communityController@getCommunity');
Route::get('/deleteCommunityy/{IDCommunity}', 'communityController@deleteC');


// Rutas que se encargan del IMEC de Rol de Usuario.
Route::get('/showRol','roleController@showRole');
Route::post('/insertR','roleController@insertRole');
Route::get('/addRol','roleController@insertView');
Route::get('/showRol','roleController@showRole');
Route::get('/deleteRole/{IDRole}','roleController@deleteRole');
Route::get('/showU','userController@showUser');
Route::get('/upRol','roleController@updateRole');

//Rutas que se encargan de la generación de reportes
Route::get('/reportCategory', 'ReportController@index');
Route::get('/reportEdition', 'ReportController@indexEdition');
Route::get('/reportSport', 'ReportController@indexSport');
Route::get('/reportCommunity', 'ReportController@indexCommunity');
Route::post('/generatePDF','ReportController@generate');
Route::post('/generateSportPDF','ReportController@generateSport');
Route::post('/generateCommunityPDF','ReportController@generateCommunity');
Route::post('/generateEditionPDF','ReportController@generateEdition');
Route::get('/reportDel', 'ReportController@indexDelegate');
Route::post('/reportPDF','ReportController@generateReport');


//Rutas que se encargan del IMEC de participantes realizado por un delegado
Route::get('/showAthletes','personController@indexDelegate');
Route::get('/insertNewPart','personController@insertPart');
Route::post('/insertCompleteRegister','personController@insertPersonByDelegate');
Route::post('/insertCompleteAthlete','personController@insertByAthleteDelegate');
Route::get('/editAthleteD/{IDPerson}', 'personController@editAthleteByDelegate');
Route::post('/updateAthlete', 'personController@updateAthlete');
Route::get('/deleteAthleteD/{IDPerson}/{imgPasaport}', 'personController@deleteByDelegate');


// Rutas que se encargan del IMEC de Participantes.
Route::get('/showP', 'personController@index');

Route::get('/newCo','personController@insertNew');

Route::get('/newDoc','personController@documents');
Route::get('/newCoa','personController@insertNewA');

Route::post('/insertA','personController@insertPerson');

Route::post('/insertDoc','personController@insertDoc');
Route::post('/searchPerson', 'personController@search');
Route::post('/filterPerson', 'personController@searchFilter');

Route::get('/deleteAthlete/{IDPerson}/{imgPasaport}', 'personController@delete');
Route::get('/upAthlete', 'personController@editAthlete');
Route::post('/saveData', 'personController@saveData');

Route::get('/editAthlete/{IDPerson}', 'personController@eAthlete');
Route::post('/editDel', 'personController@editDA');
Route::post('/editA', 'personController@editA');


// Rutas que se encargan del IMEC de Delegado.
Route::get('/showD', 'personController@showDelegados');
Route::post('/searchDelegado', 'personController@searchDelegado');
Route::get('/editDelAdmin/{IDPerson}', 'personController@editDelAdmin');
Route::post('/editDelAdmin', 'personController@editDA');
Route::get('/deleteDel/{IDPerson}', 'personController@deleteDel');

// Rutas que se encargan del IMEC de Administradores.
Route::get('/showA', 'personController@showAdmin');
Route::post('/searchAdmin', 'personController@searchAdministrador');
Route::get('/deleteAdmin/{IDPerson}', 'personController@deleteAdmin');
Route::get('/editAdmin/{IDPerson}', 'personController@editAdmin');
Route::post('/editAdminS', 'personController@editAdministrador');

Route::get('/editPerfil/', 'personController@editPerfil');
Route::post('/editPe', 'personController@editPerfill');


//Rutas personal de Apoyo delegado
Route::get('/showExtraDel', 'personController@showExtraDel');
Route::post('/searchExtraDel', 'personController@searchExtraDel');
Route::get('/editExtraDel/{IDPerson}', 'personController@editExtraDel');
Route::post('/editExtraDele', 'personController@editExtraDele');
Route::get('/deleteExtra/{IDPerson}', 'personController@deleteExtraDel');

//Rutas Personal de apoyo.
Route::get('/showExtra', 'personController@showExtra');
Route::post('/searchAp', 'personController@searchExtra');
Route::get('/editApoyo/{IDPerson}', 'personController@editExtra');
Route::post('/editExtraS', 'personController@editExtraS');
Route::get('/deleteExtra/{IDPerson}', 'personController@deleteExtra');

//Rutas resetPassword.
Route::post ('/resetPassword', 'Auth\ResetPasswordController@updatePassword');

//Rutas inscripciones por medio de Excel
Route::get ('/excel', 'excelController@index');
Route::get ('/excelData', 'excelController@readExcel');
Route::get ('/showExcelData', 'excelController@showFile');
Route::post ('/saveExcel', 'excelController@save');
Route::get ('/download', 'excelController@downloadExcelSheet');

//Rutas inscripciones por medio de Excel realizado por un delegado
Route::get ('/excelUpload', 'excelController@indexDelegate');
Route::post ('/saveExcelD', 'excelController@save');
Route::get ('/excelDataRead', 'excelController@readExcel');
Route::get ('/showExcelDataD', 'excelController@showFile');
