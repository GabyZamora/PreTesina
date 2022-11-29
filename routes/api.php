<?php

use App\Http\Controllers\API\ClienteController;
use App\Http\Controllers\API\LugarController;
use App\Http\Controllers\API\HostController;
use App\Http\Controllers\API\CategoriaController;
use App\Http\Controllers\API\ServicioController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth' 
], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
}); 

Route::get('clientes', [ClienteController::class,'index']);
Route::post('clientes', [ClienteController::class, 'store']);
Route::get('clientes/{cliente}', [ClienteController::class,'show']);
Route::put('clientes/{cliente}', [ClienteController::class,'update']);
Route::delete('clientes/{cliente}', [ClienteController::class,'destroy']);

Route::get('hosts', [HostController::class,'index']);
Route::post('hosts', [HostController::class, 'store']);
Route::get('hosts/{host}', [HostController::class,'show']);
Route::put('hosts/{host}', [HostController::class,'update']);
Route::delete('hosts/{host}', [HostController::class,'destroy']);

Route::get('lugares', [LugarController::class,'index']);
Route::post('lugares', [LugarController::class, 'store']);
Route::get('lugares/{lugar}', [LugarController::class,'show']);
Route::put('lugares/{lugar}', [LugarController::class,'update']);
Route::delete('lugares/{lugar}', [LugarController::class,'destroy']);

Route::get('servicios', [ServicioController::class,'index']);
Route::post('servicios', [ServicioController::class, 'store']);
Route::get('servicios/{servicio}', [ServicioController::class,'show']);
Route::put('servicios/{servicio}', [ServicioController::class,'update']);
Route::delete('servicios/{servicio}', [ServicioController::class,'destroy']);

Route::get('categorias', [CategoriaController::class,'index']);
Route::post('categorias', [CategoriaController::class, 'store']);
Route::get('categorias/{categoria}', [CategoriaController::class,'show']);
Route::put('categorias/{categoria}', [CategoriaController::class,'update']);
Route::delete('categorias/{categoria}', [CategoriaController::class,'destroy']);
