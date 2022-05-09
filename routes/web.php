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


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','LoginController@index');

Route::post('/put_login','LoginController@putLogin');

Route::get('/menu','MenuController@index')->name('/menu');

Route::get('/mst_shain','ShainController@index');

Route::post('/searchshain', 'ShainController@kensaku');
Route::get('/searchshain', 'ShainController@kensaku');

Route::post('/shainregist', 'ShainController@dispNewRegist');
Route::post('/shainconfilm', 'ShainController@dispShainConfilm');
Route::post('/checkshaindata', 'ShainController@checkShainData');
Route::post('/exeinstshain', 'ShainController@exeInstShain');