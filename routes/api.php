<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TestController;

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

// Route::get('/products', function(){
//     return "Yahoo";
// });

//using class, need to have namespace
// Route::get('/products', [TestController::class,'index']);

//by url
// Route::get('/products', 'App\Http\Controllers\TestController@index');
Route::post('/register', 'App\Http\Controllers\AuthController@register');

Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::get('/products', 'App\Http\Controllers\TestController@index');
});
