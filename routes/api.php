<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/barang','barangcontroller@show');
Route::post('/barang','barangcontroller@store');

Route::get('/customer','customercontroller@show');
Route::post('/customer','customercontroller@store');

Route::get('/transaksi','transaksicontroller@show');
Route::get('/transaksi/{id}','transaksicontroller@detail');
Route::post('/transaksi','transaksicontroller@store');
Route::put('/customer/{id}','customercontroller@update');
