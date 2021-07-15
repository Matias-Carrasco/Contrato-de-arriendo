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
Route::resource('representante_prov', '\App\Http\Controllers\RepresentanteProvController');
Route::get('proveedor/ID_ciudad','\App\Http\Controllers\ProveedorController@ID_ciudad');
Route::resource('proveedor','\App\Http\Controllers\ProveedorController');
Route::resource('contrato', '\App\Http\Controllers\ContratoController');
Route::resource('anexo', '\App\Http\Controllers\AnexoController');
Route::resource('clausula', '\App\Http\Controllers\ClausulaController');

Route::resource('perfil','\App\Http\Controllers\IncorporaController');
Route::resource('agrega','\App\Http\Controllers\AgregaController');
