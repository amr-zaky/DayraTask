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

Route::post('login',[\App\Http\Controllers\Admin\AuthController::class,'login'])->name('login');


Route::middleware('auth:api')->group(function (){
    Route::get('clients',[\App\Http\Controllers\CLient\ClientController::class,'getAllClient'])->name('getAllClients');
    Route::post('clients',[\App\Http\Controllers\CLient\ClientController::class,'createClient'])->name('createClient');
    Route::get('clients/{id}',[\App\Http\Controllers\CLient\ClientController::class,'getOneClient'])->name('getClientDetails');
    Route::get('getInvoices',[\App\Http\Controllers\CLient\ClientInvoiceController::class,'getAllInvoices'])->name('getAllInvoices');
    Route::post('createInvoiceAndClient',[\App\Http\Controllers\CLient\ClientInvoiceController::class,'createInvoiceAndCLinet'])->name('createInvoiceAndClient');
    Route::post('createInvoice',[\App\Http\Controllers\CLient\ClientInvoiceController::class,'CreateInvoice'])->name("createInvoice");
});
