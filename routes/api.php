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
Route::get('/mpesa/password','MpesaController@lipaNaMpesaPassword');
Route::post('/mpesa/new/access/token','MpesaController@newAccessToken');
Route::post('/mpesa/stk/push','MpesaController@stkPush')->name('lipa');
Route::post('/stk/push/callback/url', 'MpesaController@MpesaRes');