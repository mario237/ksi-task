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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('get-difference' , [\App\Http\Controllers\Api\DifferenceController::class , 'getDifferenceOfTwoLists']);


Route::resource('entries' , \App\Http\Controllers\Api\EntriesController::class);
Route::resource('cities' , \App\Http\Controllers\Api\CitiesController::class);
