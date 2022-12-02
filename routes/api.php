<?php

use App\Http\Controllers\Api\ZipCodesController;
use App\Http\Resources\ZipCodesResource;
use App\Models\ZipCodes;
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

Route::apiResource('zip-codes', ZipCodesController::class);

//Route::get('zip-codes/{id}', [ZipCodesController::class, 'show']);

/*Route::get('zip-codes/{zipcode}', function ($zip_code) {
    return "Get Zip Code";
});*/

/*Route::get('/zip-codes/{zipcode}', function ($zip_code) {
    return new ZipCodesResource(ZipCodes::findOrFail($zip_code));
});*/
