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

Route::get('/', function () {
    return view('login.Login',  ['error' => null]);
})->middleware('validsession');

Route::get('welcome/', function () {
    return view('welcome');
})->middleware('validsession');
Route::get('blade', function () {
    return view('child');
})->middleware('validsession');
Route::get('getFile', 'FileViewArchivoController@GetFile')->middleware('validsession');
Route::get('getFileById', 'FileViewArchivoController@GetFileByID')->middleware('validsession');
Route::get('downLoadFile', 'FileViewArchivoController@DownLoadFile')->middleware('validsession');
Route::get('downLoadFileByID', 'FileViewArchivoController@DownLoadFileByID')->middleware('validsession');
Route::resource('archivo', 'ArchivoController', ['middleware' => 'validsession']);
Route::resource('login', 'LoginController');
Route::get('getArchivoByiD', '_ArchivoController@getArchivoByiD')->middleware('validsession');

Route::get('editPwr/{id}', 'UsuarioController@editPwr')->middleware('validsession');
Route::put('updatePwr', 'UsuarioController@updatePwr')->middleware('validsession');
Route::resource('usuario', 'UsuarioController', ['middleware' => 'validsession']);
Route::resource('tipoDocumento', 'TipoDocumentoController', ['middleware' => 'validsession']);
Route::resource('tercero', 'TerceroController', ['middleware' => 'validsession']);
Route::resource('asociarArchivo', 'AsociarArchivoController', ['middleware' => 'validsession']);
Route::get('GetTercerobyNombreIdentno', '_TerceroController@GetTercerobyNombreIdentno')->middleware('validsession');
Route::get('GetPagaduriaByNombre', '_PagaduriaController@GetPagaduriaByNombre')->middleware('validsession');
Route::get('GetTipoDocumentoByTipo', '_TipoDocumentoController@GetTipoDocumentoByTipo')->middleware('validsession');
Route::post('guardarArchivos', '_ArchivoController@GuardarArchivos')->middleware('validsession');
Route::post('uploadArchivos', '_ArchivoController@uploadfiles')->middleware('validsession');
Route::resource('pagaduria', 'PagaduriaController');
Route::resource('pagaduria', 'PagaduriaController');
Route::get('getInformeDocumentos', 'InformesController@GetInformeDocumentos')->middleware('validsession');
Route::post('getInformeDocumentos', 'InformesController@GetInformeDocumentos')->middleware('validsession');
Route::get('getInformeDocumentosGen', 'InformesController@GetInformeDocumentosGen')->middleware('validsession');
Route::post('getInformeDocumentosGen', 'InformesController@GetInformeDocumentosGen')->middleware('validsession');


Route::get('GetFiltersInfo', 'InformesController@GetFiltersInfo')->middleware('validsession');
