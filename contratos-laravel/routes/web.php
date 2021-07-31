<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('representante_prov/ID_ciudad','\App\Http\Controllers\RepresentanteProvController@ID_ciudad');
Route::delete('/representante_prov_delete/{id}','\App\Http\Controllers\RepresentanteProvController@delete');
Route::resource('representante_prov', '\App\Http\Controllers\RepresentanteProvController');

Route::delete('/proveedor_delete/{id}','\App\Http\Controllers\ProveedorController@delete');
Route::get('proveedor/ID_ciudad','\App\Http\Controllers\ProveedorController@ID_ciudad');
Route::resource('proveedor','\App\Http\Controllers\ProveedorController');

Route::delete('/contrato_delete/{id}','\App\Http\Controllers\ContratoController@delete');
Route::resource('contrato', '\App\Http\Controllers\ContratoController');

Route::delete('/anexo_delete/{id}','\App\Http\Controllers\AnexoController@delete');
Route::resource('anexo', '\App\Http\Controllers\AnexoController');

Route::delete('/clausula_delete/{id}','\App\Http\Controllers\ClausulaController@delete');
Route::resource('clausula', '\App\Http\Controllers\ClausulaController');

Route::resource('perfil','\App\Http\Controllers\IncorporaController');

Route::get('agrega/ID_clausula','\App\Http\Controllers\AgregaController@ID_clausula');
Route::get('agrega/ClausulaContrato/{ID_contrato}','\App\Http\Controllers\AgregaController@ClausulaContrato');
Route::get('agrega/EditarClausulaContrato/{ID_contrato}/{ID_clausula}','\App\Http\Controllers\AgregaController@EditarClausulaContrato');
Route::get('agrega/EliminarClausulaContrato/{ID_contrato}/{ID_clausula}','\App\Http\Controllers\AgregaController@delete2');
Route::patch('agrega/EditarClausulaContrato/{ID_contrato}/{ID_clausula}/updateClausulaContrato','\App\Http\Controllers\AgregaController@updateClausulaContrato');


Route::resource('agrega','\App\Http\Controllers\AgregaController');

Route::get('tiene/ID_clausula','\App\Http\Controllers\TieneController@ID_clausula');
Route::resource('tiene', '\App\Http\Controllers\TieneController');


Route::get('/descargarPDF/{ID}','\App\Http\Controllers\PDFController@PDFContrato');

