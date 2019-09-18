<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//creo la ruta del controlador '/ruta',nombre del controlador@nombre del metodo
Route::get('/tasks','TaskController@index');
//delega la tarea al controlador.
       

Route::post('/tasks','TaskController@store');


Route::get('/tasks/{id}','TaskController@show');


Route::put('/tasks/{id}','TaskController@update');

