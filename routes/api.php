<?php

use Illuminate\Http\Request;

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');



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


Route::group(['middleware' => ['jwt.verify']], function()
{
  Route::get('/barang','barangcontroller@show');
  Route::post('/barang','barangcontroller@store');

  Route::get('/customer','customercontroller@show');
  Route::post('/customer','customercontroller@store');

  Route::get('/transaksi','transaksicontroller@show');
  Route::get('/transaksi/{id}','transaksicontroller@detail');
  Route::post('/transaksi','transaksicontroller@store');
  Route::put('/customer/{id}','customercontroller@update');
  Route::delete('/customer/{id}','customercontroller@destroy');

});
