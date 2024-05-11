<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\EndUser\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 
    
    Route::group(['as' => 'end-user.'],function(){
        Route::get('/'  ,[DashboardController::class , 'index'])->middleware('auth:admin');
    });
    
});

Auth::routes();

Route::get('c-cache' , function(){
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    return 'cleared';
});

Route::get('l-storage' , function(){
    Artisan::call('storage:link');
    return 'storage';
});

Route::get('migrate' , function(){
    Artisan::call('migrate');
    return 'migrate';
});

