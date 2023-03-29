<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Api\V1\ClientsController as ClientV1;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::put('v1/clients/{id}',[ClientV1::class,'update']);
Route::post('v1/clients',[ClientV1::class,'store']);

Route::apiResource('v1/clients',ClientV1::class)
    ->only(['index','show','destroy'])
    ->middleware('auth:sanctum');
Route::post('login',[App\Http\Controllers\Api\LoginController::class,'login']);
