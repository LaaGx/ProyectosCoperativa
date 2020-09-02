<?php

use App\Http\Controllers\EmpleadosController;
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
    return view('auth.login');
});

//Route::get('/empleados', 'EmpleadosController@index');
//Route::get('/empleados/create', 'EmpleadosController@create');

//Identificar si el usuario esta logueado para conceder el acceso.
Route::resource('empleados', 'EmpleadosController')->middleware('auth');

//Deshabilitamos el modulo de registro. 
Auth::routes(['register'=>true,'reset'=>false]);

Route::get('/home', 'HomeController@index')->name('home');


//Parte de la autentificacion que no requiero.
/**Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/

Route::resource('trabajadores', 'trabajadoresController');
Route::resource('trabajadores', 'trabajadoresController');
Route::resource('asociados', 'asociadosController')->middleware('auth');