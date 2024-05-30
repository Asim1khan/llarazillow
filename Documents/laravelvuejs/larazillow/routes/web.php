<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserAccountControlloer;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('app');
// });

Route::get('/',[IndexController::class,'index']);
Route::get('/show',[IndexController::class,'show']);
Route::resource('Listing',ListingController::class)
->only(['create','store','edit','update','destroy'])
->middleware('auth');
Route::resource('Listing',ListingController::class)
->except(['create','store','edit','update','destory']);
Route::get('login',[AuthController::class,'create'])
->name('login');
Route::post('login',[AuthController::class,'store'])
->name('login.store');
Route::delete('logout',[AuthController::class,'destory'])
->name('logout');
Route::resource('user-account',UserAccountControlloer::class)
->only(['create','store']);
