<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;

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



Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::get('/',  [ServiceController::class, 'index']);

    //services routes
    Route::post('service/changestatus',[ServiceController::class,'changeStatus'])->name('services.changeStatus');
    Route::resource('services', ServiceController::class);

    //portfolio routes
    Route::resource('portfolios', PortfolioController::class);

    //contacts routes
    Route::post('contact/reply',[ContactController::class,'reply'])->name('contacts.reply');
    Route::resource('contacts', ContactController::class);

});
