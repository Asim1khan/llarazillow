<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('app');
// });

Route::get('/',[IndexController::class,'index']);
Route::get('/show',[IndexController::class,'show']);
Route::resource('Listing',ListingController::class);
