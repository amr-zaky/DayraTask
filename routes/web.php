<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login',[\App\Http\Controllers\FrontEnd\AuthController::class,'login'])->name('loginPage');



Route::get('/home',[\App\Http\Controllers\FrontEnd\HomeController::class,'index'])->name('homePage');
Route::get('/clients/',[\App\Http\Controllers\FrontEnd\ClientController::class,'index'])->name('getAllClientsPage');
Route::get('/clients/{id}',[\App\Http\Controllers\FrontEnd\ClientController::class,'getClientDetail'])->name('getClientDetailPage');
Route::get('/clientCreate',[\App\Http\Controllers\FrontEnd\ClientController::class,'create'])->name('createClientPage');
Route::get('/invoice/',[\App\Http\Controllers\FrontEnd\InvoiceController::class,'getAllInvoices'])->name('getAllInvoicesPage');
Route::get('/invoice/{client_id}',[\App\Http\Controllers\FrontEnd\InvoiceController::class,'CreateInvoice'])->name('createInvoiceToClient');
Route::get('/createInvoiceAndClient',[\App\Http\Controllers\FrontEnd\InvoiceController::class,'createInvoiceAndClient'])->name('createInvoiceAndClientPage');
