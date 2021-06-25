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

Route::post('login',[\App\Http\Controllers\Admin\AuthController::class,'login']);


Route::middleware('auth:api')->group(function (){

});

Route::get('users',[\App\Http\Controllers\CLient\ClientController::class,'getAllClient']);
Route::post('users',[\App\Http\Controllers\CLient\ClientController::class,'createClient']);
Route::get('users/{id}',[\App\Http\Controllers\CLient\ClientController::class,'getOneClient']);


Route::get('getInvoices',[\App\Http\Controllers\CLient\ClientInvoiceController::class,'getAllInvoices']);
Route::post('invoiceClient',[\App\Http\Controllers\CLient\ClientInvoiceController::class,'createInvoiceAndCLinet']);
Route::post('createInvoice',[\App\Http\Controllers\CLient\ClientInvoiceController::class,'CreateInvoice']);
