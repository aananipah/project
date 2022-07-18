<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\LoginController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('ok', function()
{
    return response()->json("OK");
});
Route::get('auth/index', [AuthController::class, 'index']);

Route::post('login', 'ReactController@login');
Route::get('getID/{id}', 'ReactController@getID');
Route::get('getBio/{id}', 'ReactController@getBio');
Route::get('getTimbang/{id}', 'ReactController@getTimbang');
Route::get('getDetailTimbang/{id}', 'ReactController@getDetailTimbang');
Route::get('getImunisasi/{id}', 'ReactController@getImunisasi');
Route::get('getVitA/{id}', 'ReactController@getVitA');
Route::get('getAgenda', 'ReactController@getAgenda');
Route::post('postProfile/{id}', 'ReactController@postProfile');


// Route::post('register', 'AuthController@register');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::get('/auth/index', 'AuthController@index');

