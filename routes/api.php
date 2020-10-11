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
  Route::group(['middleware'=> ['api.superadmin']], function()
  {
    Route::delete('/customer/{id}','customercontroller@destroy');
  });

  Route::group(['middleware'=> ['api.admin']], function()
  {
    Route::post('/barang','barangcontroller@store');
    Route::post('/customer','customercontroller@store');
    Route::post('/transaksi','transaksicontroller@store');
    Route::put('/customer/{id}','customercontroller@update');

  });

  Route::get('/barang','barangcontroller@show');
  Route::get('/customer','customercontroller@show');
  Route::get('/transaksi','transaksicontroller@show');
  Route::get('/transaksi/{id}','transaksicontroller@detail');


});
